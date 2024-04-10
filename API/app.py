from flask import Flask,jsonify,request
import mysql.connector

app=Flask(__name__)

@app.route('/getname',methods=['GET'])
def getname():
    name=request.args.get('name')
    connection = mysql.connector.connect(
    host='sql301.infinityfree.com',
    user='if0_36339381',
    password='krVKX0mD3s3qI',
    database='if0_36339381_employee'
    )
    if connection.is_connected():
        cursor = connection.cursor()
        cursor.execute("SELECT fname FROM users")
        rows=cursor.fetchall()
        data=[]
        for row in rows:
            print(row)
            if name in row:
                print(name)
                data.append({
                    'name':row
                })

        returnresponse={
            'data':data
        }
        print(data)
        print(jsonify(data))
        return jsonify(data)


    else:
        print('Failed to connect to MySQL database')
        return jsonify({
            'error':"Sql Db Error Occured"
        })


if __name__=='__main__':
    app.run(debug=True)