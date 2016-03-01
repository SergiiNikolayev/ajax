<!DOCTYPE html>
<html>
<head>

<title>Ajax page</title>

<script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>


<script>
    function funcBefore(){
        $("#information").text("Ожидание данных");
    }

    function funcSuccess(data){
        $("#information").text(data);
    }

    $(document).ready(function(){
        $("#load").bind("click", function(){
        var user = "Default User";
            $.ajax ({
                url: "content.php",
                type: "POST",
                data: ({name: user, number: user.length}),
                dataType: "html",
                beforeSend: funcBefore,
                success: funcSuccess,
            });
        });

        $("#done").bind("click", function(){
            $.ajax ({
                url: "checklogin.php",
                type: "POST",
                data: ({name: $("#name").val()}),
                dataType: "html",
                beforeSend: function () {
                    $("#information").text("Ожидание данных");
                },
                success: function (data) {
                    if(data == "Busy")
                        alert( $("#name") + "имя занято");
                    else
                        $("#information").text(data);
                } //there is no any comma or other
            });
        });
    });

    $(document).ajaxStart(function () {
        $("#gif").show();
    });
    $(document).ajaxStop(function () {
        $("#gif").hide();
    });

</script>
</head>
<body>
    <h2>Ajax!</h2>

    <input type="text" id="name" placeholder="введите логин"/>
    <input type="button" id="done" value="Готово"/>
    <p id="load" style="cursor: pointer">Загрузить данные</p>
    <img id="gif" width="130px" height="90px" src="img/gear.gif" style="display: none; float: left">
    <div>
        <div id="information"></div>
    </div><br>
    <div style="height: 150px"></div>

 <!-- |||||||||||||||||||||||||||||||||2nd block|||||||||||||||||||||||||||||||||||||| -->

    <h2>JSON</h2>
    <script>
        $(document).ready (function(){
            $("select[name='country']").bind("change", function(){
                $("select[name='city']").empty(); // if country not selected make city empty
                $.get(
                    "countries.php",
                    {country: $("select[name='country']").val()},
                    function (data) {
                        data = JSON.parse(data);//coded json that in php file countries.php

                        for (var id in data){
                            $("select[name='city']").append($("<option value='" + id + "'>" + data[id] + "</option>"));
                        } //there is also no commas
                    });
                });
            });
    </script>


    <label>Укажите страну</label>
    <select name="country">
        <option value="0" selected="selected"></option>
        <option value="1" selected="selected">US</option>
        <option value="2" selected="selected">France</option>
    </select>
    <label>Города</label>
    <select name="city">
        <option value="0"></option>
    </select>

</body>


</html>
