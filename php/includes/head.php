<head>
    <title>
      Index Mockup V1
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type = "text/javascript" src="js/resources.js"></script>
    <style>
        body {
            height: 1500px;
            font-family: Century Gothic, sans-serif;
        }
        .mapContent {
            background-color: #f4f4f4;
            width: 600px;
            height: 100%;
            float: left;
            padding-left: 20px;
        }

        #searchResults {

            height: 100%;
            float: inherit;
            padding: 20px;

        .imthemap {
            float: center;
        }

        }

        #custom-search-input{
            padding: 3px;
            border: solid 1px #E4E4E4;
            border-radius: 6px;
            background-color: red;
        }

        #custom-search-input input{
            border: 0;
            box-shadow: none;
        }

        #custom-search-input button{
            margin: 2px 0 0 0;
            background: none;
            box-shadow: none;
            border: 0;
            color: #666666;
            padding: 0 8px 0 10px;
            border-left: solid 1px #ccc;
        }

        #custom-search-input button:hover{
            border: 0;
            box-shadow: none;
            border-left: solid 1px #ccc;
        }

        #custom-search-input .glyphicon-search{
            font-size: 18px;
        }
		
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table, td, th {
			border: 1px solid black;
			padding: 5px;
		}

		th {text-align: center;}

        <?php echo file_get_contents("dist/myStyle.css") ?>
    </style>
</head>