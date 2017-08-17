سلام
<form action="/store/search" method="post">
    {{csrf_field()}}
    <input name="Name" type="text">
    <input name="Code" type="text">
    <input type="submit">
</form>