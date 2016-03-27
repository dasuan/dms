<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Adila Faruk">
         

        <title>Exporting Data to a CSV File</title>


        <style type="text/css">
            body{
                font-family: sans-serif;
                font-weight:300;
                padding-top:30px;
                color:#666;
            }
            .container{
                text-align:center;  
            }
            a{ color:#1C2045; font-weight:350;}
            table{
                font-weight:300;
                margin:0px auto;
                border: 1px solid #1C2045;
                padding:5px;
                color:#666;

            }
            th,td{ 
                border-bottom: 1px solid #dddddd;
                text-align:center;
                margin: 10px;
                padding:0 10px;
            }
            hr{ 
                border:0;
                border-top: 1px solid #E7C254;
                margin:20px auto;
                width:50%;
            }
            .button{
                background-color:#1C2045;
                color:#E7C254;
                padding:5px 20px;
                max-width: 300px;
                line-height:1.5em;
                text-align:center;
                margin:5px auto;
            }
            .button a{ color:#E7C254;}
            .refs{ display:block; margin:auto; text-align:left; max-width:500px; }
            .refs .label{  font-size:1.4em;}
            .refs > ul{ margin-top:10px; line-height:1.5em;}
        </style>
    </head>

    <body>
        <div class='container'> 
          <div id="dvData">
                <table class='table table-bordered'>
            <tr>
                <th>日期</th>
                <th>宿舍号</th>
                <th>成绩</th>
                <th>备注</th>
            </tr><tr><td>2016-03-27</td><td>101</td><td>发给谁发个</td><td>85</td></tr><tr><td>2016-03-27</td><td>102</td><td>啊发发发到付</td><td>25</td></tr></table>
            </div>


                <a href="#" id ="export" role='button'>Click On This Here Link To Export The Table Data into a CSV File
                </a>


        <!-- Scripts ----------------------------------------------------------- -->
        <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
        <!-- If you want to use jquery 2+: https://code.jquery.com/jquery-2.1.0.min.js -->
        <script type='text/javascript'>
        $(document).ready(function () {

            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character

                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';

                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';

                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,\ufeff' + encodeURIComponent(csv);

                // For IE (tested 10+)
                if (window.navigator.msSaveOrOpenBlob) {
                    var blob = new Blob([decodeURIComponent(encodeURI(csv))], {
                        type: "text/csv;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, filename);
                } else {
                    $(this)
                        .attr({
                            'download': filename
                            ,'href': csvData
                            //,'target' : '_blank' //if you want it to open in a new window
                    });
                }

                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  

                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();

                    return $text.replace('"', '""'); // escape double quotes

                }
            }


            // This must be a hyperlink
            $("#export").click(function (event) {
                // var outputFile = 'export'
                var outputFile = window.prompt("What do you want to name your output file (Note: This won't have any effect on Safari)") || 'export';
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('#dvData > table'), outputFile]);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>
    </body>
</html>