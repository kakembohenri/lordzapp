<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<body>
    <style>
        .header{
            text-align: center;
        }

        .header img{
            height: 4rem;
            width: 7rem;
        }

        .main{
            margin:1rem 3rem;
        }
        
        .main-items{
            display: flex;
            align-items: center;
            font-size: 2rem;
            margin: 1rem 0rem;
        }

        .main-items span{
            width: 70%;
            border-bottom: 0.2rem black dotted;
            margin-left: 0.5rem;
        }

        
    </style>
    <div class="header">
        <img src="images/company-logo1.png">
        <h1>LordzApp</h1>
    </div>
    <div class="main">
        <div class="main-items">
            Name: <span>{{ $reciept->name }}</span>
        </div>
        <div class="main-items">
            To: <span>{{ $reciept->to }}</span>
        </div>
        <div class="main-items">
            Amount: <span>{{ $reciept->amount }} shillings</span>
        </div>
        <div class="main-items item-balance">
            Balance: <span>{{ $reciept->balance }} shillings</span>
        </div>
    </div>
</body>
</html>