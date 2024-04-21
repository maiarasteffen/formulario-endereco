<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(5, 78, 178), rgb(86, 164, 188));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 80%;
        }
        fieldset{
            border: 3px solid #009595;
        }
        legend{
            border: 1px solid #009595;
            margin: 15px 0;
            padding: 10px;
            text-align: center;
            background-color: #009595;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #700404;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        #submit{
            background-image: linear-gradient(to right,rgb(5, 78, 178), rgb(86, 164, 188));
            width: 95%;
            border: none;
            padding: 15px;
            margin: 15px 0 15px 25px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(86, 164, 188), rgb(5, 78, 178));
        }
        a {
           color: blanchedalmond; 
           text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
        }
        a:hover {
           color: blanchedalmond; 
           text-decoration: none;
           
        }

        .buscar {
            padding: 6px 30px; 
            margin-top: 25px; 
            background-color: #009595;
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        .container {
            padding: 100px;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            color: #fff;
        }

        
        .link {
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 15px;
            color: #fff;
        }

        .link-entrar {
            text-decoration: none;
            color: white;
            border: 3px solid #009595;
            border-radius: 10px;
            padding: 10px;
            top: 50%; 
            left: 50%; 
            border-radius: 10px;
        }

        .link-entrar:hover{
            background-color: #009595;
        }

    </style>