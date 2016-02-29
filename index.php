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
        $("#out").text("////");
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
                }
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
    <p>Ajax!</p>
    <input type="text" id="name" placeholder="введите логин"/>
    <input type="button" id="done" value="Готово"/>
    <p id="load" style="cursor: pointer">Загрузить данные</p>
    <img id="gif" width="130px" height="90px" src="img/gear.gif" style="display: none; float: left">
    <div id="information" style="float: left"></div>


</body>


</html>