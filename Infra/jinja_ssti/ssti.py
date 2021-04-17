from flask import Flask, request, redirect, render_template_string, render_template
from jinja2 import Environment

app = Flask(__name__)
Jinja2 = Environment()

app.secret_key="j1nj4_1nj3c710n_700_345y_4_m3_10114320"

@app.route("/")
def index():
    return redirect("/jinja")

@app.route("/jinja", methods = ['POST', 'GET'])
def jinja():
    if request.method == "POST":
        name = request.values.get('name')

        if name is not None:
            render = render_template_string(f"Hello {name}")

            return render_template("index.html", render=render)

    return render_template("index.html")


if __name__ == "__main__":
    app.run(debug=False, host='0.0.0.0', port=5000)
