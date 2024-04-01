from flask import Flask,jsonify,request
import mysql.connector

app=Flask(__name__)

@app.route('/getname',methods=['GET'])
def getname():
    name=request.args.get('name')
    connection = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='employee management system'
    )
    if connection.is_connected():
        cursor = connection.cursor()
        cursor.execute("SELECT name FROM users")
        rows=cursor.fetchall()
        data=[]
        for row in rows:
            if name in row:
                data.append({
                    'name':row
                })

        returnresponse={
            'data':data
        }

        return jsonify(data)


    else:
        print('Failed to connect to MySQL database')
        return jsonify({
            'error':"Sql Db Error Occured"
        })


if __name__=='__main__':
    app.run(debug=True)