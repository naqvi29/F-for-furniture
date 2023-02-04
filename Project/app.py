from flask import Flask, render_template ,request, session, redirect, url_for, jsonify
from flask_mysqldb import MySQL
import os
import json
from werkzeug.utils import secure_filename
from os.path import join, dirname, realpath
import stripe
from datetime import datetime
from google.oauth2 import id_token
from google_auth_oauthlib.flow import Flow
from pip._vendor import cachecontrol
import google.auth.transport.requests
import googleapiclient.discovery

import pathlib
import requests


app = Flask(__name__)

# YOUR_DOMAIN = 'https://furniture.dokarobar.com/'
YOUR_DOMAIN = 'http://localhost:5000/'


UPLOAD_FOLDER = join(dirname(realpath(__file__)), 'static/assets/img/products')
COLOR_IMAGES = join(dirname(realpath(__file__)), 'static/assets/img/color-images')
FINISHING_IMAGES = join(dirname(realpath(__file__)), 'static/assets/img/finishing-item-images')
SIZE_IMAGES = join(dirname(realpath(__file__)), 'static/assets/img/size-images')

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
# app.config['MYSQL_PASSWORD'] = 'LAwrence1234**'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'furniture'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

stripe.api_key = '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'

GOOGLE_CLIENT_ID = '196136592290-fjrsfjosv3l7fn5r5gg6g2vpoghch0p5.apps.googleusercontent.com'
# GOOGLE_CLIENT_SECRET = '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'
# GOOGLE_DISCOVERY_URL = (
#     "https://accounts.google.com/.well-known/openid-configuration"
# )
client_secrets_file = os.path.join(pathlib.Path(__file__).parent, "client_secret_196136592290-fjrsfjosv3l7fn5r5gg6g2vpoghch0p5.apps.googleusercontent.com.json")
flow = Flow.from_client_secrets_file(  #Flow is OAuth 2.0 a class that stores all the information on how we want to authorize our users
    client_secrets_file=client_secrets_file,
    scopes=["https://www.googleapis.com/auth/userinfo.profile", "https://www.googleapis.com/auth/userinfo.email", "openid"],  #here we are specifing what do we get after the authorization
    redirect_uri="https://furniture.dokarobar.com/login/callback"  #and the redirect URI is the point where the user will end up after the authorization
)
# configure secret key for session protection)
app.secret_key = "_5#y2L''F4Q8z\n\xec]/"


# stripe.api_key = 'sk_test_51JmHU9ApaRg7P8yR8LoM8vj0MOKmEFEsdF8GM3nvf0ptNOUveSERzo8tcYdw2SKkcn1IeToUUDePOuDBjwllRgEi00JOR2lDKA'
mysql = MySQL(app)



ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg', 'gif'])

def allowed_file(filename):
	return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS 
 

@app.route("/")
def index():
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    if 'loggedin' in session:
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        return render_template("index.html",home=True,categories=categories,loggedin=True,username=session['name'],cart_items=cart_items, total=total,total_cart=len(cart_items))
    else:
        return render_template("index.html",home=True,categories=categories)


@app.route("/login",methods=['GET','POST'])
def login():
    if request.method == 'POST':
        email = request.form.get("email")
        password = request.form.get("password") 
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from users where email=%s;',[email])    
        account = cursor.fetchone()
        if not account:
            return render_template("login.html",error="Invalid Email!")
        if account['password'] != password:
            return render_template("login.html",error="Invalid Password!")
        session['loggedin'] = True
        session['userid'] = str(account["id"])
        session['name'] = account["name"]
        session['email'] = account["email"]
        session['type'] = account['type']
        return redirect(url_for("index"))
        
    return render_template("login.html")

@app.route("/login2")
def login2():
    authorization_url, state = flow.authorization_url()  #asking the flow class for the authorization (login) url
    session["state"] = state
    return redirect(authorization_url)

@app.route('/login/callback')
def oauth2callback():
	# Verify the state parameter matches the one that was sent with the original request
	if request.args.get("state") != session["state"]:
	    response = make_response(json.dumps("Invalid state parameter"), 401)
	    response.headers["Content-Type"] = "application/json"
	    return response
    # Retrieve the authorization code from the request
	authorization_code = request.args.get("code")
	# Use the authorization code to exchange for an access token
	# Use the access token to make an API call to retrieve the user's information
	try:
	    service = googleapiclient.discovery.build("oauth2", "v2", credentials=credentials)
	    userinfo = service.userinfo().get().execute()
	except Exception as e:
	    response = make_response(json.dumps("Failed to fetch user information."), 401)
	    response.headers["Content-Type"] = "application/json"
	    return response
    # Validate the state parameter
    # if request.args.get('state') != session.get('state'):
    #     raise Exception('Invalid state parameter')

    # Exchange the authorization code for an access token
    # flow.fetch_token(authorization_response=request.url)
    # credentials = flow.credentials

    # Use the access token to authenticate the user
    # userinfo_service = googleapiclient.discovery.build(
    #     'oauth2', 'v2', credentials=credentials)
    # userinfo = userinfo_service
    # return str(credentials)

@app.route("/logout")
def logout():
    try:
        if 'loggedin' in session:
            session.pop('loggedin', None)
            session.pop('userid', None)
            session.pop('name', None)
            session.pop('email', None)
            session.pop('type', None)
        return redirect(url_for('index'))
    except Exception as e:
        return str(e)

@app.route("/signup",methods=['GET','POST'])
def signup():
    if request.method=='POST':
        fullname = request.form.get("fullname")
        email = request.form.get("email")
        password = request.form.get("password")
        confpassword = request.form.get("confpassword")
        if password != confpassword:
            return render_template("register.html",error="Passwords dont match!") 
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from users where email=%s;',[email])    
        exist = cursor.fetchone()
        if exist:
            return render_template("register.html",error="Email Already Exists") 
        cursor.execute('INSERT INTO users (email,name,password,type) VALUES (%s,%s,%s,"user");',[email,fullname,password])
        mysql.connection.commit()
        return redirect(url_for("login"))

    return render_template("register.html")


@app.route("/contact",methods=['GET','POST'])
def contact():
    if request.method == 'POST':
        name = request.form.get("name")
        email = request.form.get("email")
        message = request.form.get("message")        
        cursor = mysql.connection.cursor()
        cursor.execute('INSERT INTO messages (name,email,message) VALUES (%s,%s,%s);',[name,email,message])
        mysql.connection.commit()
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from categories;')    
        categories = cursor.fetchall()
        if 'loggedin' in session:
            cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
            cart_items = cursor.fetchall()
            total = 0
            for i in cart_items:
                x = i['price'] * i['qty']
                total = total + x
            return render_template("contact.html",contact=True,categories=categories, send=True,loggedin=True,cart_items=cart_items,total=total,total_cart=len(cart_items))          
        else:
            return render_template("contact.html",contact=True,categories=categories, send=True)
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    if 'loggedin' in session:
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        return render_template("contact.html",contact=True,categories=categories,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_cart=len(cart_items))
    else:
        return render_template("contact.html",contact=True,categories=categories)

# @app.route("/product-details/<int:id>")
# def product_details_new(id):    
#     cursor = mysql.connection.cursor()
#     cursor.execute('Select * from categories;')    
#     categories = cursor.fetchall()
#     cursor.execute('Select * from products where id=%s;',[id])    
#     product = cursor.fetchone()
#     sizes = json.loads(product['sizes'])
    
#     if 'loggedin' in session:
#         cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
#         cart_items = cursor.fetchall()
#         total = 0
#         for i in cart_items:
#             x = i['price'] * i['qty']
#             total = total + x
#         return render_template("product-details-new.html",shop=True,product=product,categories=categories,sizes=sizes,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_cart=len(cart_items))
#     else:
#         return render_template("product-details-new.html",shop=True,categories=categories,product=product,sizes=sizes)

@app.route("/product-details/<int:id>")
def product_details_new(id):    
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    cursor.execute('Select * from products where id=%s;',[id])    
    product = cursor.fetchone()
    sizes_ids = json.loads(product['sizes_ids'])
    color_ids = json.loads(product['color_ids'])
    finishing_items_ids = json.loads(product['finishing_items_ids'])
    stripe_ids = json.loads(product['stripe_ids'])

    product.update({"sizes_ids":sizes_ids})
    product.update({"color_ids":color_ids})
    product.update({"finishing_items_ids":finishing_items_ids})
    product.update({"stripe_ids":stripe_ids})

    sizes = []
    for size_id in sizes_ids:
        cursor.execute('Select * from sizes where id=%s',[int(size_id)])
        size_data = cursor.fetchall()
        sizes.append(size_data)

    leather_categories = []
    for color_id in color_ids:
        cursor.execute('Select * from colors where id=%s',[int(color_id)])
        color_data = cursor.fetchall()
        leather_category_id = color_data[0]['category_id']        
        cursor.execute('Select * from leather_categories where id=%s',[int(leather_category_id)])
        leather_category_data = cursor.fetchall()
        data = {'id':leather_category_data[0]['id'],'name':leather_category_data[0]['name'],'additional_price':float(leather_category_data[0]['additional_price'])}
        if data not in leather_categories:            
            leather_categories.append(data)
    
    for leather_category in leather_categories:        
        colors= []
        for color_id in color_ids:
            cursor.execute('Select * from colors where id=%s',[int(color_id)])
            color_data = cursor.fetchall()
            leather_category_id = color_data[0]['category_id'] 
            
            if int(leather_category_id) == int(leather_category['id']):                
                colors.append(color_data)
        leather_category.update({"colors":colors})

    finishing_categories = []
    for finishing_item_id in finishing_items_ids:
        cursor.execute('Select * from finishing_items where id=%s',[int(finishing_item_id)])
        finishing_item_data = cursor.fetchall()
        finishing_category_id = finishing_item_data[0]['finishing_category_id']        
        cursor.execute('Select * from finishing_categories where id=%s',[int(finishing_category_id)])
        finishing_category_data = cursor.fetchall()
        data = {'id':finishing_category_data[0]['id'],'name':finishing_category_data[0]['name']}
        if data not in finishing_categories:            
            finishing_categories.append(data)
    
    for finishing_category in finishing_categories:        
        finishing_items= []
        for finishing_item_id in finishing_items_ids:
            cursor.execute('Select * from finishing_items where id=%s',[int(finishing_item_id)])
            finishing_item_data = cursor.fetchall()
            finishing_category_id = finishing_item_data[0]['finishing_category_id'] 
            
            if int(finishing_category_id) == int(finishing_category['id']):                
                finishing_items.append(finishing_item_data)
        finishing_category.update({"finishing_items":finishing_items})

    # return jsonify({"finishing_categories":finishing_categories})
    # return jsonify({"leather_categories":leather_categories})
    # return jsonify({"product":product})
    
    if 'loggedin' in session:
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        return render_template("product-details-final.html",shop=True,product=product,categories=categories,sizes=sizes,leather_categories=leather_categories,finishing_categories=finishing_categories,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_cart=len(cart_items))
    else:
        return render_template("product-details-final.html",shop=True,categories=categories,product=product,sizes=sizes,leather_categories=leather_categories,finishing_categories=finishing_categories)

# @app.route("/product-details/<int:id>")
# def product_details(id):
#     cursor = mysql.connection.cursor()
#     cursor.execute('Select * from categories;')    
#     categories = cursor.fetchall()
#     cursor.execute('Select * from products where id=%s;',[id])    
#     product = cursor.fetchone()
#     colors = []
#     color_ids = json.loads(product['color_ids'])
#     for i in color_ids:
#         cursor.execute('Select * from colors where id=%s;',[i])
#         color = cursor.fetchone()
#         colors.append({"id":color['id'],"name":color['name'],"code":color['code']})
        
#     sizes = []
#     size_ids = json.loads(product['sizes'])
#     for i in size_ids:
#         cursor.execute('Select * from sizes where id=%s;',[i])
#         size = cursor.fetchone()
#         sizes.append({"id":size['id'],"name":size['name']})


#     if 'loggedin' in session:
#         cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
#         cart_items = cursor.fetchall()
#         total = 0
#         for i in cart_items:
#             x = i['price'] * i['qty']
#             total = total + x
#         return render_template("product-details.html",shop=True,categories=categories,product=product,loggedin=True,username=session['name'],colors=colors,sizes=sizes,cart_items=cart_items,total=total,total_cart=len(cart_items))
#     else:
#         return render_template("product-details.html",shop=True,categories=categories,product=product,colors=colors,sizes=sizes)

@app.route("/shop")
def shop():
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    cursor.execute('Select * from brands;')    
    brands = cursor.fetchall()
    cursor.execute('Select * from products;')    
    products = cursor.fetchall()
    cursor.execute('Select * from colors;')    
    colors = cursor.fetchall()
    cursor.execute('Select * from sizes;')    
    sizes = cursor.fetchall()
    total_products = len(products)
    if 'loggedin' in session:
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_products=total_products,total_cart=len(cart_items))
    else:
        return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,total_products=total_products)

@app.route("/cart")
def cart():
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    if 'loggedin' in session:
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        product_id_qty_list = []
        product_id_size = {}
        for i in cart_items:            
            # product_id_qty = {}
            product_id_qty = {"product_id":i['product_id'],"qty":i['qty'],"size":i['size_name']}
            product_id_qty_list.append(product_id_qty)

            # product_id_qty.update({i['product_id']:i['qty']})
            # size = i['size_name']
            # product_id_size.update({i['product_id']:size})

        # data = buyer name + buyer email + total products + total amount + product ids with qty
        data = [session['name'],session['email'],len(cart_items),total,product_id_qty_list]
        return render_template("cart.html",data=json.dumps(data),cart_items=cart_items,total=total,total_cart=len(cart_items),categories=categories)
    else:
        return redirect(url_for("login"))

@app.route("/remove-from-cart",methods=['POST'])
def remove_from_cart():
    if 'loggedin' in session:
        data = request.json
        cart_item_id = int(data['id'])

        cursor = mysql.connection.cursor()
        cursor.execute('DELETE FROM cart_items where id=%s',[cart_item_id])    
        mysql.connection.commit()
        return "True"
    else:
        return redirect(url_for("login"))

@app.route("/add-to-cart-route",methods=['GET','POST'])
def add_to_cart_route():
    if request.method == "POST":
        if 'loggedin' in session:
            data = request.json
            product_id = int(data['product_id'])
            try:
                color_name = data['color_name']
            except Exception:
                color_name = None
            try:
                size_name = data['size_name']
            except Exception:
                size_name = None
            try:
                qty = int(data['qty'])
            except Exception:
                qty = 1
            try:
                finishing_item = data['finishing_item']
            except Exception:
                finishing_item = None
            try:
                total_price = data['total_price']
            except Exception:
                total_price = None
            # fetch product details 
            
            cursor = mysql.connection.cursor()
            cursor.execute('Select * from products where id=%s;',[product_id])    
            product_details = cursor.fetchone()
            # x = json.loads(product_details['sizes'])
            # price= None
            # for i in x:
                # if str(i['size'])==str(size_name):
                    # price = i['price']


            # check if the product already in cart:
            cursor = mysql.connection.cursor()
            cursor.execute('Select * from cart_items where user_id=%s and product_id=%s;',[session['userid'],product_id])    
            exist = cursor.fetchone()
            if exist:
                return "duplicate"
                prevQty = int(exist['qty'])
                UpdatedQty = prevQty+1
                cursor.execute('UPDATE cart_items SET qty=%s WHERE user_id=%s and product_id=%s;',[UpdatedQty,session['userid'],product_id])
                mysql.connection.commit()
            else:
                cursor.execute('INSERT INTO cart_items (user_id,product_id,product_name,qty,price,image,size_name,color_name,finishing_item) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s);',[session['userid'],product_id,product_details['name'],qty,float(total_price),product_details['image'],size_name,color_name,finishing_item])
                mysql.connection.commit()
            return "True"

        else:
            return redirect(url_for("login"))
    else:
        return redirect(url_for("login"))

# @app.route("/add-to-cart-route",methods=['GET','POST'])
# def add_to_cart_route():
#     if request.method == "POST":
#         if 'loggedin' in session:
#             data = request.json
#             product_id = int(data['product_id'])
#             try:
#                 color_id = int(data['color_id'])
#             except Exception:
#                 color_id = None
#             try:
#                 size_id = int(data['size_id'])
#             except Exception:
#                 size_id = None
#             try:
#                 qty = int(data['qty'])
#             except Exception:
#                 qty = 1
#             # fetch product details 
            
#             cursor = mysql.connection.cursor()
#             cursor.execute('Select * from products where id=%s;',[product_id])    
#             product_details = cursor.fetchone()
#             print("product is : ",product_details)

#             # check if the product already in cart:
#             cursor = mysql.connection.cursor()
#             cursor.execute('Select * from cart_items where user_id=%s and product_id=%s;',[session['userid'],product_id])    
#             exist = cursor.fetchone()
#             if exist:
#                 return "duplicate"
#                 prevQty = int(exist['qty'])
#                 UpdatedQty = prevQty+1
#                 cursor.execute('UPDATE cart_items SET qty=%s WHERE user_id=%s and product_id=%s;',[UpdatedQty,session['userid'],product_id])
#                 mysql.connection.commit()
#             else:
#                 cursor.execute('INSERT INTO cart_items (user_id,product_id,product_name,qty,price,image,size_id,color_id) VALUES (%s,%s,%s,%s,%s,%s,%s,%s);',[session['userid'],product_id,product_details['name'],qty,float(product_details['price']),product_details['image'],size_id,color_id])
#                 mysql.connection.commit()
#             return "True"

#         else:
#             return redirect(url_for("login"))
#     else:
#         return redirect(url_for("login"))



@app.route("/category/<int:id>")
def category(id):
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    cursor.execute('Select * from brands;')    
    brands = cursor.fetchall()
    cursor.execute('Select * from categories where id=%s;',[id])    
    selected = cursor.fetchone()
    cursor.execute('Select * from products where category_id=%s;',[id])    
    products = cursor.fetchall()
    total_products = len(products)
    if 'loggedin' in session:
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        return render_template("shop.html",shop=True,categories=categories,selected=selected,brands=brands,products=products,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_products=total_products,total_cart=len(cart_items))
    else:
        return render_template("shop.html",shop=True,categories=categories,selected=selected,brands=brands,products=products,total_products=total_products)

@app.route("/apply-filter",methods=['POST'])
def apply_filter():
    if request.method=='POST':
        brands = request.form.getlist('brand-checkbox')
        # colors = request.form.getlist('color-checkbox')
        min_amount = request.form.getlist('minamount')[0]
        max_amount = request.form.getlist('maxamount')[0]
        # size = request.form['size-radio']
        brand_ids = []
        for i in brands:
            brand_ids.append(int(i))
        brand_json = json.dumps(brand_ids)
        brand_ids = brand_json.replace("[","(")
        brand_ids = brand_ids.replace("]",")")
        color_ids = []
        cursor = mysql.connection.cursor()
        # product_ids_for_colors = []
        # for i in colors:
        #     color_ids.append(int(i))
        #     cursor.execute('Select product_ids from colors where id =%s',[i])
        #     product_id = cursor.fetchone()['product_ids']
        #     try:
        #         for j in json.loads(product_id):
        #             product_ids_for_colors.append(j)
        #     except Exception as e:
        #         print(e)
        # product_ids_for_colors = list(dict.fromkeys(product_ids_for_colors))
            
        # product_ids_for_colors = json.dumps(product_ids_for_colors)
        # product_ids_for_colors = product_ids_for_colors.replace("[","(")
        # product_ids_for_colors = product_ids_for_colors.replace("]",")")

        # cursor.execute('Select product_ids from sizes where id=%s;',[size])
        # product_ids_for_sizes = json.loads(cursor.fetchone()['product_ids'])
        # product_ids_for_sizes = list(product_ids_for_sizes)
        # product_ids_for_sizes = product_ids_for_sizes.replace("[","(")
        # product_ids_for_sizes = product_ids_for_sizes.replace("]",")")

        # p_ids = product_ids_for_colors + product_ids_for_sizes
        # p_ids = list(dict.fromkeys(p_ids))
        # p_ids = json.dumps(p_ids)
        # p_ids = p_ids.replace("[","(")
        # p_ids = p_ids.replace("]",")")

        cursor = mysql.connection.cursor()
        cursor.execute('Select * from products where brand_id in '+brand_ids+' and price >= '+min_amount+' and price <= '+max_amount)
        # cursor.execute('Select * from products where brand_id in %s and id in %s',[brand_ids,product_ids_for_colors])
        products = cursor.fetchall()

        cursor.execute('Select * from categories;')    
        categories = cursor.fetchall()
        cursor.execute('Select * from brands;')    
        brands = cursor.fetchall()
        cursor.execute('Select * from colors;')    
        colors = cursor.fetchall()
        cursor.execute('Select * from sizes;')    
        sizes = cursor.fetchall()

        total_products = len(products)
        
        if 'loggedin' in session:
            cursor = mysql.connection.cursor()
            cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
            cart_items = cursor.fetchall()
            total = 0
            for i in cart_items:
                x = i['price'] * i['qty']
                total = total + x
            return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,loggedin=True,username=session['name'],colors=colors,sizes=sizes,cart_items=cart_items,total=total,total_products=total_products,total_cart=len(cart_items))
        else:
            return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,total_products=total_products)

@app.route("/search")
def search():
    if request.args.get("query"):
        query = request.args.get("query")
        
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from categories;')    
        categories = cursor.fetchall()
        cursor.execute('Select * from brands;')    
        brands = cursor.fetchall()
        expression = '%'+query+'%'
        cursor.execute('SELECT * FROM products where name like %s;',[expression])    
        products = cursor.fetchall()
        cursor.execute('Select * from colors;')    
        colors = cursor.fetchall()
        cursor.execute('Select * from sizes;')    
        sizes = cursor.fetchall()

        total_products = len(products)
        if 'loggedin' in session:
            cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
            cart_items = cursor.fetchall()
            total = 0
            for i in cart_items:
                x = i['price'] * i['qty']
                total = total + x
            return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_products=total_products,total_cart=len(cart_items))
        else:
            return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,total_products=total_products)

@app.route("/sort-changed/<string:value>")
def sort_changed(value):
    cursor = mysql.connection.cursor()
    cursor.execute('Select * from categories;')    
    categories = cursor.fetchall()
    cursor.execute('Select * from brands;')    
    brands = cursor.fetchall()
    if value == "low_to_high":
        cursor.execute('Select * from products ORDER BY price ASC;')    
    elif value == "high_to_low":
        cursor.execute('Select * from products ORDER BY price DESC;')    
    elif value == "a_to_z":
        cursor.execute('Select * from products ORDER BY name ASC;')    
    elif value == "z_to_a":
        cursor.execute('Select * from products ORDER BY name DESC;')    
    products = cursor.fetchall()
    cursor.execute('Select * from colors;')    
    colors = cursor.fetchall()
    cursor.execute('Select * from sizes;')    
    sizes = cursor.fetchall()
    total_products = len(products)
    if 'loggedin' in session:
        cursor.execute('Select * from cart_items where user_id=%s',[session['userid']])
        cart_items = cursor.fetchall()
        total = 0
        for i in cart_items:
            x = i['price'] * i['qty']
            total = total + x
        return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,loggedin=True,username=session['name'],cart_items=cart_items,total=total,total_products=total_products,sort=value,total_cart=len(cart_items))
    else:
        return render_template("shop.html",shop=True,categories=categories,brands=brands,products=products,colors=colors,sizes=sizes,total_products=total_products,sort=value)

# --------------------------------- STRIPE ----------------------------------------
@app.route('/create-checkout-session', methods=['POST'])
def create_checkout_session():
    # try:
    data = request.form.get("data")
    data = json.loads(data)
    name = data[0]
    email = data[1]
    total_products = data[2]
    total_amount = data[3]
    product_ids_with_qty = data[4]
    # product_ids_with_size = data[5]
    # for i in range(2):
    # return product_ids_with_qty\
    line_items_array = []
   
    for x in product_ids_with_qty:
        cursor = mysql.connection.cursor()
        cursor.execute("Select stripe_ids FROM products WHERE id=%s;",[int(x['product_id'])])
        # cursor.execute("Select stripe_ids FROM products WHERE id=%s;",[int(x['product_id'])])
        stripe_ids = cursor.fetchone()['stripe_ids']
        for j in json.loads(stripe_ids):
            if j['size']==x['size']:
                # return str(j)
                line_items_array.append({"price":j['stripe_price_id'],"quantity":int(x['qty'])})

        # price_id = cursor.fetchone()['stripe_price_id']
        # return str(price_id)
        # line_items_array.append({"price":price_id,"quantity":product_ids_with_qty[['qty']]})

    # return str(a)
    # return str(len(product_ids_with_qty))
    # return str(line_items_array)

    # package_id = data[5]
    # cursor = mysql.connection.cursor()
    # cursor.execute("Select * FROM packages WHERE id=%s;",(package_id))
    # package_data = cursor.fetchone()
    # price_id = package_data['stripe_price_id']
    
    checkout_session = stripe.checkout.Session.create(
        line_items=line_items_array,
        mode='payment',
        success_url=YOUR_DOMAIN + '/success?data='+json.dumps(data),
        cancel_url=YOUR_DOMAIN + '/cancel',
        automatic_tax={'enabled': False},
    )
    # except Exception as e:
    #     return str(e)

    return redirect(checkout_session.url, code=303)


# stripe success 
@app.route("/success")
def success():
    if "data" in request.args:
        data = request.args.get("data")
        data = json.loads(data)
        name = data[0]
        email = data[1]
        total_products = data[2]
        total_amount = data[3]
        product_ids_with_qty = data[4]
        

        date_time = datetime.now()
        d = date_time.strftime("%c")

        
        cursor = mysql.connection.cursor()
        cursor.execute("INSERT INTO orders (name,email, total_products, order_amount, product_ids_with_qty,date) VALUES (%s,%s, %s, %s, %s, %s);",(name,email, int(total_products), float(total_amount), json.dumps(product_ids_with_qty),d))
        mysql.connection.commit()

        # send mail 
        
        # msg = Message('Order Confirmed! | GetVehicles', sender =   'getvehiclesreport@gmail.com', recipients = [data[1]])
        # msg.html = '<p class="text-center"><strong>Your order has been placed successfully. The report will be sent to you soon.</strong> If you have any questions, please email at <a href="mailto:getvehiclesreport@gmail.com">getvehiclesreport@gmail.com</a>.</p>'
        # mail.send(msg)
        # msg = Message('New Order Received! | GetVehicles', sender =   'getvehiclesreport@gmail.com', recipients = ['getvehiclesreport@gmail.com'])
        # msg.html = '<p class="text-center"><strong>New Order Received from '+data[0]+'!</strong><br> <strong>package</strong> '+package_name+'<br> <strong>vin</strong> '+data[3]+'<br> <strong>email</strong> '+data[1]+'<br> <strong>date</strong> '+d+' .</p>'
        # mail.send(msg)
        return redirect(url_for("success"))
    return render_template("stripe-success.html")

# stripe cancel 
@app.route("/cancel")
def cancel():
    return redirect(url_for("shop"))
    # return render_template("stripe-cancel.html")
# -x-x-x-x-x-x-x-x-x ADMIN DASH -x-x-x-x-x-x-x-x-x
@app.route("/admin")
def admin_dashboard():
    if 'loggedin' in session:
        if session['type']=="admin":
            cursor = mysql.connection.cursor()
            cursor.execute('SELECT COUNT(*) FROM products;')
            products= cursor.fetchone()['COUNT(*)']
            cursor.execute('SELECT COUNT(*) FROM messages;')
            messages= cursor.fetchone()['COUNT(*)']
            cursor.execute('SELECT COUNT(*) FROM users;')
            users= cursor.fetchone()['COUNT(*)']
            cursor.execute('SELECT COUNT(*) FROM orders;')
            sales= cursor.fetchone()['COUNT(*)']
            return render_template("admin-index.html",products=products,messages=messages,users=users,sales=sales)     
        else:
            session.pop('loggedin', None)
            session.pop('userid', None)
            session.pop('name', None)
            session.pop('email', None)
            session.pop('type', None)
            session.pop('type', None)
            return redirect(url_for("admin_login"))
    else:
        return redirect(url_for("admin_login"))

@app.route("/admin-login",methods=['GET','POST'])
def admin_login():
    if request.method == 'POST':
        email = request.form.get("email")
        password = request.form.get("password") 
        cursor = mysql.connection.cursor()
        cursor.execute('Select * from users where email=%s and type="admin";',[email])    
        account = cursor.fetchone()
        if not account:
            return render_template("admin-login.html",error="Invalid Email!")
        if account['password'] != password:
            return render_template("admin-login.html",error="Invalid Password!")
        session['loggedin'] = True
        session['userid'] = str(account["id"])
        session['name'] = account["name"]
        session['email'] = account["email"]
        session['type'] = account['type']
        return redirect(url_for("admin_dashboard"))
        
    return render_template("admin-login.html")

@app.route("/admin-view/<string:type>")
def admin_view(type):
    if 'loggedin' in session:
        if session['type']=="admin": 
            if type == "brands":                
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from brands;')    
                data = cursor.fetchall()
                return render_template("admin-view-brands.html",data=data)
            elif type == "categories":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from categories;')    
                data = cursor.fetchall()
                return render_template("admin-view-categories.html",data=data)
            elif type == "leather":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from leather_categories;')    
                data = cursor.fetchall()
                return render_template("admin-view-leather.html",data=data)
            elif type == "finishing":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from finishing_categories;')    
                data = cursor.fetchall()
                return render_template("admin-view-finishing.html",data=data)
            elif type == "colors":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from colors;')    
                data = cursor.fetchall()
                list = []
                for i in data:
                    try:
                        cursor.execute('Select * from leather_categories where id=%s',[int(i['category_id'])])
                        category_data = cursor.fetchone()
                        i.update({"category_name":category_data['name']})
                        i.update({"additional_price":category_data['additional_price']})
                        list.append(i)
                    except:
                        pass
                return render_template("admin-view-colors.html",data=list)
            elif type == "finishing-items":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from finishing_items;')    
                data = cursor.fetchall()
                list = []
                for i in data:
                    cursor.execute('Select * from finishing_categories where id=%s',[int(i['finishing_category_id'])])
                    category_data = cursor.fetchone()
                    i.update({"category_name":category_data['name']})
                    list.append(i)
                return render_template("admin-view-finishing-items.html",data=list)
            elif type == "sizes":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from sizes;')    
                data = cursor.fetchall()
                return render_template("admin-view-sizes.html",data=data)
            elif type == "messages":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from messages;')    
                data = cursor.fetchall()
                return render_template("admin-view-messages.html",data=data)
            elif type == "users":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from users;')    
                data = cursor.fetchall()
                return render_template("admin-view-users.html",data=data)
            elif type == "orders":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from orders;')    
                data = cursor.fetchall()
                return render_template("admin-view-orders.html",data=data)
            elif type == "products":
                cursor = mysql.connection.cursor()
                cursor.execute('Select * from products;')    
                data = cursor.fetchall()
                # for i in data:
                    # colors = []
                    # color_ids = json.loads(i['color_ids'])
                    # for x in color_ids:
                    #     cursor.execute('Select * from colors where id=%s;',[x])    
                    #     color = cursor.fetchone()
                    #     colors.append(color)
                    # i.update({"colors":colors})
                    # sizes = []
                    # sizes_ids = json.loads(i['sizes'])
                    # for x in sizes_ids:
                    #     cursor.execute('Select * from sizes where id=%s;',[x])    
                    #     size = cursor.fetchone()
                    #     sizes.append(size)
                    # i.update({"sizes":sizes})


                # return jsonify({"data":data})
                return render_template("admin-view-products.html",data=data)


        else:
            session.pop('loggedin', None)
            session.pop('userid', None)
            session.pop('name', None)
            session.pop('email', None)
            session.pop('type', None)
            session.pop('type', None)
            return redirect(url_for("admin_login"))
    else:
        return redirect(url_for("admin_login"))

@app.route("/admin-add/<string:type>", methods=['GET','POST'])
def admin_add(type):
    if 'loggedin' in session:
        if session['type']=="admin": 
            if type == "brand":
                if request.method == 'POST':
                    name = request.form.get("name")
                    cursor = mysql.connection.cursor()
                    cursor.execute('INSERT into brands (name) VALUES (%s)',[name])    
                    mysql.connection.commit()
                    return redirect("/admin-view/brands")
                elif request.method == 'GET':
                    return render_template("admin-add-brand.html")
            if type == "category":
                if request.method == 'POST':
                    name = request.form.get("name")
                    cursor = mysql.connection.cursor()
                    cursor.execute('INSERT into categories (name) VALUES (%s)',[name])    
                    mysql.connection.commit()
                    return redirect("/admin-view/categories")
                elif request.method == 'GET':
                    return render_template("admin-add-category.html")
            if type == "leather":
                if request.method == 'POST':
                    name = request.form.get("name")
                    additional_price = request.form.get("additional_price")
                    try:
                        additional_price = float(additional_price)
                    except:
                        pass
                    cursor = mysql.connection.cursor()
                    cursor.execute('INSERT into leather_categories (name,additional_price) VALUES (%s,%s)',[name,additional_price])    
                    mysql.connection.commit()
                    return redirect("/admin-view/leather")
                elif request.method == 'GET':
                    return render_template("admin-add-leather.html")
            if type == "finishing":
                if request.method == 'POST':
                    name = request.form.get("name")
                    cursor = mysql.connection.cursor()
                    cursor.execute('INSERT into finishing_categories (name) VALUES (%s)',[name])    
                    mysql.connection.commit()
                    return redirect("/admin-view/finishing")
                elif request.method == 'GET':
                    return render_template("admin-add-finishing.html")
            if type == "color":
                if request.method == 'POST':
                    name = request.form.get("name")
                    leather_category_id = request.form.get("leather_category")
                    image = request.files['image']
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(COLOR_IMAGES, filename))
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from leather_categories where id=%s',[int(leather_category_id)])
                    category_data = cursor.fetchone()
                    cursor.execute('INSERT into colors (name,category_id,image) VALUES (%s,%s,%s)',[name,int(leather_category_id),filename,])    
                    mysql.connection.commit()
                    return redirect("/admin-view/colors")
                elif request.method == 'GET':
                    
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT id,name from leather_categories;')
                    data = cursor.fetchall()  
                    return render_template("admin-add-color.html",leather_categories=data)
            if type == "finishing-items":
                if request.method == 'POST':
                    name = request.form.get("name")
                    additional_price = request.form.get("additional_price")
                    try:
                        additional_price = float(additional_price)
                    except:
                        pass
                    finishing_category_id = request.form.get("finishing_category")
                    image = request.files['image']
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(FINISHING_IMAGES, filename))
                    cursor = mysql.connection.cursor()
                    cursor.execute('INSERT into finishing_items (name,finishing_category_id,additional_price,image) VALUES (%s,%s,%s,%s)',[name,int(finishing_category_id),additional_price,filename])    
                    mysql.connection.commit()
                    return redirect("/admin-view/finishing-items")
                elif request.method == 'GET':
                    
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT id,name from finishing_categories;')
                    data = cursor.fetchall()  
                    return render_template("admin-add-finishing-item.html",finishing_categories=data)
            if type == "size":
                if request.method == 'POST':
                    name = request.form.get("name")
                    additional_price = request.form.get("additional_price")
                    height = request.form.get("height")
                    width = request.form.get("width")
                    depth = request.form.get("depth")
                    
                    image = request.files['image']
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(SIZE_IMAGES, filename))
                    cursor = mysql.connection.cursor()
                    cursor.execute('INSERT into sizes (name,additional_cost,height,width,depth,image) VALUES (%s,%s,%s,%s,%s,%s)',[name,additional_price,height,width,depth,filename])    
                    mysql.connection.commit()
                    return redirect("/admin-view/sizes")
                elif request.method == 'GET':
                    return render_template("admin-add-size.html")
            if type == "product":
                if request.method == 'POST':
                    
                    name = request.form.get("name")
                    brand_id = request.form.get("brand_id")
                    category_id = request.form.get("category_id")
                    # size_ids_string = request.form.getlist("sel-size")
                    # sizes = []
                    # prices = []
                    price = float(request.form.get("price"))
                    description = request.form.get("description")  
                    
                    color_ids = request.form.getlist("color_ids")[0].split(",")
                    finishing_items_ids = request.form.getlist("finishing_items")[0].split(",")
                    sizes_ids = request.form.getlist("sizes")[0].split(",")

                    cursor = mysql.connection.cursor()
                    cursor.execute('Select name from brands where id=%s;',[brand_id])    
                    brand_name = cursor.fetchone()['name']
                    cursor.execute('Select name from categories where id=%s;',[category_id])    
                    category_name = cursor.fetchone()['name']

                    
                    image = request.files["image"]
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(UPLOAD_FOLDER, filename))

                        # register on stripe 
                        default_price_data = {"currency":"GBP","unit_amount":int(price*100),"tax_behavior":"inclusive"}
                        resp = stripe.Product.create(name=name,default_price_data=default_price_data)
                        stripe_product_id = resp['id']
                        stripe_price_id = resp['default_price']
                        stripe_ids = {"price":price,"stripe_product_id":stripe_product_id,"stripe_price_id":stripe_price_id}

                        # stripe_ids = []
                        # for size in sizes:
                        #     default_price_data = {"currency":"GBP","unit_amount":int(float(size['price'])*100),"tax_behavior":"inclusive"}
                        #     resp = stripe.Product.create(name=name,default_price_data=default_price_data)
                        #     stripe_product_id = resp['id']
                        #     stripe_price_id = resp['default_price']
                        #     stripe_ids.append({"price":price,"stripe_product_id":stripe_product_id,"stripe_price_id":stripe_price_id})
                        
                        cursor.execute('INSERT into products (category_id,brand_id,color_ids,category,brand,name,price,sizes_ids,description,image,stripe_ids,finishing_items_ids) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);',(category_id,brand_id,json.dumps(color_ids),category_name,brand_name,name,price,json.dumps(sizes_ids),description,filename,json.dumps(stripe_ids),json.dumps(finishing_items_ids)))
                        mysql.connection.commit() 
                        product_id = cursor.lastrowid   
                        return redirect("/admin-view/products")
                    else:
                        # rediret 
                        cursor = mysql.connection.cursor()
                        cursor.execute('Select * from brands;')    
                        brands = cursor.fetchall()
                        cursor.execute('Select * from categories;')    
                        categories = cursor.fetchall()
                        cursor.execute('Select * from sizes;')    
                        sizes = cursor.fetchall()
                        return render_template("admin-add-product.html",brands=brands,categories=categories,sizes=sizes,error ="Invalid Image or Image not found!")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('Select * from brands;')    
                    brands = cursor.fetchall()
                    cursor.execute('Select * from categories;')    
                    categories = cursor.fetchall()
                    cursor.execute('Select * from sizes;')    
                    sizes = cursor.fetchall()
                    cursor.execute('Select * from colors;')    
                    colors = cursor.fetchall()
                    cursor.execute('Select * from finishing_items;')    
                    finishing_items = cursor.fetchall()
                    return render_template("admin-add-product.html",brands=brands,categories=categories,sizes=sizes,colors=colors,finishing_items=finishing_items)
        else:
            session.pop('loggedin', None)
            session.pop('userid', None)
            session.pop('name', None)
            session.pop('email', None)
            session.pop('type', None)
            session.pop('type', None)
            return redirect(url_for("admin_login"))
    else:
        return redirect(url_for("admin_login"))
@app.route("/admin-edit/<string:type>/<int:id>", methods=['GET','POST'])
def admin_edit(type,id):
    if 'loggedin' in session:
        if session['type']=="admin": 
            if type == "brands":
                if request.method == 'POST':
                    name = request.form.get("name")
                    cursor = mysql.connection.cursor()
                    cursor.execute('UPDATE brands SET name=%s where id=%s;',[name,id])    
                    mysql.connection.commit()
                    return redirect("/admin-view/brands")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from brands where id=%s',[id])    
                    data = cursor.fetchone()
                    return render_template("admin-edit-brand.html",data=data)
            if type == "categories":
                if request.method == 'POST':
                    name = request.form.get("name")
                    cursor = mysql.connection.cursor()
                    cursor.execute('UPDATE categories SET name=%s where id=%s;',[name,id])    
                    mysql.connection.commit()
                    return redirect("/admin-view/categories")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from categories where id=%s',[id])    
                    data = cursor.fetchone()
                    return render_template("admin-edit-categories.html",data=data)
            if type == "leather":
                if request.method == 'POST':
                    name = request.form.get("name")
                    additional_price = request.form.get("additional_price")
                    cursor = mysql.connection.cursor()
                    cursor.execute('UPDATE leather_categories SET name=%s,additional_price=%s where id=%s;',[name,additional_price,id])    
                    mysql.connection.commit()
                    return redirect("/admin-view/leather")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from leather_categories where id=%s',[id])    
                    data = cursor.fetchone()
                    return render_template("admin-edit-leather.html",data=data)
            if type == "finishing":
                if request.method == 'POST':
                    name = request.form.get("name")
                    cursor = mysql.connection.cursor()
                    cursor.execute('UPDATE finishing_categories SET name=%s where id=%s;',[name,id])    
                    mysql.connection.commit()
                    return redirect("/admin-view/finishing")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from finishing_categories where id=%s',[id])    
                    data = cursor.fetchone()
                    return render_template("admin-edit-finishing.html",data=data)
            if type == "colors":
                if request.method == 'POST':
                    name = request.form.get("name")
                    leather_category_id = request.form.get("leather_category")
                    image = request.files.get('image')
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(COLOR_IMAGES, filename))
                    cursor = mysql.connection.cursor()
                    if image and allowed_file(image.filename):
                        cursor.execute('UPDATE colors SET name=%s,category_id=%s,image=%s where id=%s;',[name,leather_category_id,filename,id])   
                    else:
                        cursor.execute('UPDATE colors SET name=%s,category_id=%s where id=%s;',[name,leather_category_id,id])   
                    mysql.connection.commit() 
                    return redirect("/admin-view/colors")
            if type == "finishing-items":
                if request.method == 'POST':
                    name = request.form.get("name")
                    additional_price = request.form.get("additional_price")
                    try:
                        additional_price = float(additional_price)
                    except:
                        pass
                    finishing_category_id = request.form.get("finishing_category")
                    image = request.files.get('image')
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(FINISHING_IMAGES, filename))
                    cursor = mysql.connection.cursor()
                    if image and allowed_file(image.filename):
                        cursor.execute('UPDATE finishing_items SET name=%s,finishing_category_id=%s,additional_price=%s,image=%s where id=%s;',[name,finishing_category_id,additional_price,filename,id])   
                    else:
                        cursor.execute('UPDATE finishing_items SET name=%s,finishing_category_id=%s,additional_price=%s where id=%s;',[name,finishing_category_id,additional_price,id])   
                    mysql.connection.commit() 
                    return redirect("/admin-view/finishing-items")



                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from finishing_items where id=%s',[id])    
                    data = cursor.fetchone()
                    
                    
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT id,name from finishing_categories;')
                    finishing_categories = cursor.fetchall()  
                    return render_template("admin-edit-finishing-items.html",data=data,finishing_categories=finishing_categories)
            if type == "sizes":
                if request.method == 'POST':
                    name = request.form.get("name")
                    additional_price = request.form.get("additional_price")
                    try:
                        additional_price = float(additional_price)
                    except:
                        pass
                    height = request.form.get("height")
                    width = request.form.get("width")
                    depth = request.form.get("depth")
                    try:
                        image = request.files['image']
                    except:
                        image = None
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(SIZE_IMAGES, filename))
                        
                    cursor = mysql.connection.cursor()
                    if image and allowed_file(image.filename):                        
                        cursor.execute('UPDATE sizes SET name=%s,additional_cost=%s,height=%s,width=%s,depth=%s,image=%s where id=%s;',[name,additional_price,height,width,depth,filename,id])
                    else:
                        cursor.execute('UPDATE sizes SET name=%s,additional_cost=%s,height=%s,width=%s,depth=%s where id=%s;',[name,additional_price,height,width,depth,id])
                        
                    mysql.connection.commit()
                    return redirect("/admin-view/sizes")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('SELECT * from sizes where id=%s',[id])    
                    data = cursor.fetchone()
                    return render_template("admin-edit-sizes.html",data=data)
            if type == "products":
                if request.method == 'POST':
                    name = request.form.get("name")
                    brand_id = request.form.get("brand_id")
                    category_id = request.form.get("category_id")
                    size_ids_string = request.form.getlist("sel-size")
                    color_ids_string = request.form.getlist('sel-color')
                    print(size_ids_string)
                    color_ids = []
                    for i in color_ids_string:
                        color_ids.append(int(i))
                    size_ids = []
                    for i in size_ids_string:
                        size_ids.append(int(i))
                    price = float(request.form.get("price"))
                    tags = request.form.get("tags")
                    description = request.form.get("description")                    
                    cursor = mysql.connection.cursor()
                    cursor.execute('Select name from brands where id=%s;',[brand_id])    
                    brand_name = cursor.fetchone()['name']
                    cursor.execute('Select name from categories where id=%s;',[category_id])    
                    category_name = cursor.fetchone()['name']
                    image = request.files["image"]
                    
                    product_id = id
                    if image and allowed_file(image.filename):
                        filename = secure_filename(image.filename)
                        image.save(
                                os.path.join(UPLOAD_FOLDER, filename))
                        # cursor.execute('INSERT into products (category_id,brand_id,color_ids,category,brand,name,price,sizes,tags,description,image) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);',(category_id,brand_id,json.dumps(color_ids),category_name,brand_name,name,price,json.dumps(size_ids),tags,description,filename))
                        # mysql.connection.commit() 

                        cursor.execute('UPDATE products SET category_id=%s,brand_id=%s,color_ids=%s,category=%s,brand=%s,name=%s,price=%s,sizes=%s,tags=%s,description=%s,image=%s where id=%s',[category_id,brand_id,json.dumps(color_ids),category_name,brand_name,name,price,json.dumps(size_ids),tags,description,filename,id])
                        mysql.connection.commit() 
                    else:
                        cursor.execute('UPDATE products SET category_id=%s,brand_id=%s,color_ids=%s,category=%s,brand=%s,name=%s,price=%s,sizes=%s,tags=%s,description=%s where id=%s',[category_id,brand_id,json.dumps(color_ids),category_name,brand_name,name,price,json.dumps(size_ids),tags,description,id])
                        mysql.connection.commit() 
                           
                    # now add product id into color and size table 
                    
                    for i in color_ids:
                        cursor.execute('SELECT product_ids from colors where id=%s',[i])
                        color_data = cursor.fetchone()['product_ids']
                        try:
                            color_data = json.loads(color_data)
                        except Exception:
                            color_data = []
                        if product_id not in color_data:
                            color_data.append(product_id)
                            cursor.execute('UPDATE colors SET product_ids=%s WHERE id=%s ;',[json.dumps(color_data),i])
                            mysql.connection.commit()
                    for i in size_ids:
                        cursor.execute('SELECT product_ids from sizes where id=%s',[i])
                        size_data = cursor.fetchone()['product_ids']
                        try:
                            size_data = json.loads(size_data)
                        except Exception:
                            size_data = []
                        if product_id not in size_data:
                            size_data.append(product_id)
                            cursor.execute('UPDATE sizes SET product_ids=%s WHERE id=%s ;',[json.dumps(size_data),i])
                            mysql.connection.commit()

                    return redirect("/admin-view/products")
                elif request.method == 'GET':
                    cursor = mysql.connection.cursor()
                    cursor.execute('Select * from brands;')    
                    brands = cursor.fetchall()
                    cursor.execute('Select * from categories;')    
                    categories = cursor.fetchall()
                    cursor.execute('Select * from sizes;')    
                    sizes = cursor.fetchall()
                    cursor.execute('Select * from colors;')    
                    colors = cursor.fetchall()
                    cursor.execute('Select * from products where id=%s',[id])
                    data = cursor.fetchone()
                    return render_template("admin-edit-product.html",brands=brands,categories=categories,sizes=sizes,colors=colors,data=data)
        else:
            session.pop('loggedin', None)
            session.pop('userid', None)
            session.pop('name', None)
            session.pop('email', None)
            session.pop('type', None)
            session.pop('type', None)
            return redirect(url_for("admin_login"))
    else:
        return redirect(url_for("admin_login"))

@app.route("/admin-delete/<string:type>/<int:id>")
def admin_delete(type,id):
    if 'loggedin' in session:
        if session['type']=="admin": 
            if type == "brands":                
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from brands where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/brands')
            elif type == "categories":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from categories where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/categories')
            elif type == "leather":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from leather_categories where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/leather')
            elif type == "finishing":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from finishing_categories where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/finishing')
            elif type == "colors":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from colors where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/colors')
            elif type == "finishing-items":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from finishing_items where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/finishing-items')
            elif type == "sizes":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from sizes where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/sizes')
            elif type == "messages":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from messages where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/messages')
            elif type == "users":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from users where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/users')
            elif type == "products":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from products where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/products')
            elif type == "orders":
                cursor = mysql.connection.cursor()
                cursor.execute('DELETE from orders where id=%s;',[id])
                mysql.connection.commit() 
                return redirect('/admin-view/orders')



        else:
            session.pop('loggedin', None)
            session.pop('userid', None)
            session.pop('name', None)
            session.pop('email', None)
            session.pop('type', None)
            session.pop('type', None)
            return redirect(url_for("admin_login"))
    else:
        return redirect(url_for("admin_login"))

# -x-x-x-x-x-x-x-x-x ADMIN DASH -x-x-x-x-x-x-x-x-x
if __name__ =="__main__":
    app.run(debug=True)