<html>
<form action="/custom/add" method="post">
    {{csrf_field()}}
        <fieldset>
            <legend>Personal information:</legend>

            cuskind:<br>
            <input type="text" name="cusKind">
            <br>
            cusname:<br>
            <input type="text" name="cusName">
            <br>
            cusfamily:<br>
            <input type="text" name="casFamily">
            <br>
            cusphone<br>
            <input type="text" name="cusPhone">
            <br>
            cusstatus:<br>
            <input type="text" name="cusStatus">
            <br>
            cusfathername:<br>
            <input type="text" name="cusFatherName">
            <br>
            cusbdate:<br>
            <input type="date" name="cusBDate">
            <br>
            cuspoint:<br>
            <input type="text" name="cusPoint">
            <br>
            cuscellno:<br>
            <input type="text" name="cusCellNo">
            <br>
            cuspaykind:<br>
            <input type="text" name="cusPayKind">
            <br>
            <input type="submit" value="Submit">

        </fieldset>
    </form>
</html>