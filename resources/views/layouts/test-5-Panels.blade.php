<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
body {
    background: #fafafa;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #333;
}


.tab-panels ul {
    margin: 0;
    padding: 0;
}
.tab-panels ul li {
    list-style-type: none;
    display: inline-block;
    background: #999;
    margin: 0;
    padding: 3px 10px;
    border-radius: 10px 10px 0 0;
    color: #fff;
    font-weight: 200;
    cursor: pointer;

}
.tab-panels ul li:hover {
    color: #fff;
    background: #666;
}

.tab-panels ul li.active {
    color: #fff;
    background: #666;
}

.tab-panels .panel {
    display:none;
    background: #c9c9c9;
    padding: 30px;
    border-radius: 0 0 10px 10px;
}

.tab-panels .panel.active {
    display:block;
}
</style>
</head>

<body>






<div class="tab-panels">
            <ul class="tabs">
                <li rel="panel1" class="active">panel1</li>
                <li rel="panel2">panel2</li>
                <li rel="panel3">panel3</li>
                <li rel="panel4">panel4</li>
            </ul>

            <div id="panel1" class="panel active">
                content1<br/>
                content1<br/>
                content1<br/>
                content1<br/>
                content1<br/>
            </div>
            <div id="panel2" class="panel">
                content2<br/>
                content2<br/>
                content2<br/>
                content2<br/>
                content2<br/>
            </div>
            <div id="panel3" class="panel">
                content3<br/>
                content3<br/>
                content3<br/>
                content3<br/>
                content3<br/>
            </div>
            <div id="panel4" class="panel">
                content4<br/>
                content4<br/>
                content4<br/>
                content4<br/>
                content4<br/>
            </div>
        </div>



        <div class="tab-panels">
            <ul class="tabs">
                <li rel="panel5" class="active">panel5</li>
                <li rel="panel6">panel6</li>
                <li rel="panel7">panel7</li>
                <li rel="panel8">panel8</li>
            </ul>

            <div id="panel5" class="panel active">
                content5<br/>
                content5<br/>
                content5<br/>
                content5<br/>
                content5<br/>
            </div>
            <div id="panel6" class="panel">
                content6<br/>
                content6<br/>
                content6<br/>
                content6<br/>
                content6<br/>
            </div>
            <div id="panel7" class="panel">
                content7<br/>
                content7<br/>
                content7<br/>
                content7<br/>
                content7<br/>
            </div>
            <div id="panel8" class="panel">
                content8<br/>
                content8<br/>
                content8<br/>
                content8<br/>
                content8<br/>
            </div>
        </div>


    <script>

        $(function(){

            $('.tab-panels .tabs li').on('click', function(){
                var panel = $(this).closest('.tab-panels');

                $panel.find('.tabs li.active').removeClass('active'); // remove all active
                $(this).addClass('active'); // add active to the clicked one 

                //figure out which panel to show
                var panelToShow = $(this).attr('rel'); // save the rel of clicked one to panelToShow

                      
                $('.tab-panels .panel.active').slideUp(300, showNextPanel); // panel content up and call function showNextPanel

                    function showNextPanel(){

                        $(this).removeClass('active'); // remove the 
                        $('#'+panelToShow).slideDown(300, function(){
                            $(this).addClass('active');
                        });


                    }
            });
        }); // end main function 




    </script>

        </body>

        </html>