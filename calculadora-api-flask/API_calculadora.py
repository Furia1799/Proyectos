from flask import Flask , jsonify , request
app = Flask(__name__)

if __name__ == '__main__':
    app.run(debug=True, port=5000)

@app.route('/')
def hello_world():
    return 'Hello, furia'

@app.route('/calcular', methods=['POST'])
def calcular():
    json_recibido = {}
    json_enviar = {}
    json_enviar['operaciones'] = []
    json_recibido = request.json
    print(json_recibido)
    for ope in json_recibido['operaciones']:
        try:
            operacion = ope['operacion']
            resultado = eval(operacion)#print(resultado)
            error = ""
        except Exception:
            error = "Sintaxis Incorrecta"
            resultado = "verifique la operacion"

        json_enviar['operaciones'].append({
            'error': error,
            'resultado': resultado
        })
       #print("acceder a la operacion " + ope['operacion'])
    return json_enviar


@app.route('/agregarProducto', methods=['POST'])
def addProducto():
    new_producto = {
        "name": request.json['name'],
        "price": request.json['price'],
        "quantity": request.json['quantity']
    }
    print(request.json)
    return jsonify({"message": "Producto a;adido", "TotalProducto": "lista Productos", "Producto": request.json})