from flask import Flask, request, jsonify
import pickle
import pandas as pd
import joblib

app = Flask(__name__)
app.config["DEBUG"] = True

from flask_cors import CORS

CORS(app)

# Load the model
model = pickle.load(open('model2.pkl', 'rb'))
model_columns = joblib.load('model_columns.pkl')


@app.route('/')
def default():
    return '<h1> API server is Working </h1>'


@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    # print(pd.json_normalize(data))
    category = ['Gender', 'Married', 'Education', 'Self_Employed','Property_Area', 'Dependants']
    query = pd.get_dummies(pd.json_normalize(data), columns=category, dummy_na=True)
    # print(df_ohe)
    # query = pd.get_dummies(df_ohe, drop_first=True)
    print(query)
    query = query.reindex(columns=model_columns, fill_value=0)
    # print(query)
    loan_predict = model.predict_proba(query)

    output = loan_predict[0].tolist()

    result = {"default_score": str(round(output[0]*100, 2)), "non_default_score": str(round(output[1]*100, 2))}


    return jsonify(result)

    # return str(loan_predict)
    # return '<h1> Predicting... </h1>'


if __name__ == '__main__':
    app.run(port=5000, debug=True)
