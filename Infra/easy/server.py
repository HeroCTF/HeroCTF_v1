from flask import Flask, request, render_template
from jinja2 import Environment


app = Flask(__name__)
Jinja2 = Environment()


@app.route("/source", methods = ['POST', 'GET'])
def login():
    if request.method == "POST":
        if request.form["username"] == "admin" and request.form["password"] == "baseball123":
            return render_template("source.html", flag=1)
        else:
            return render_template("source.html", flag=0)

    return render_template("source.html")


@app.route("/hlogin")
def hlogin():
    return render_template("hlogin.html")


if __name__ == "__main__":
    app.run(debug=False, host='0.0.0.0', port=6666)
