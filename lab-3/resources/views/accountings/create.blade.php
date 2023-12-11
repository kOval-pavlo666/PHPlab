<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/accountings" method="post">
        @csrf
        <label for="">
            FullName
            <input name="fullName" type="text">
        </label>
        <label for="">
            Position
            <input name="position" type="text">
        </label>
        <label for="">
            Salary
            <input name="salary" type="number">
        </label>
        <label for="">
            ChildrenQuantity
            <input name="childrenQuantity" type="number">
        </label>
        <label for="">
            Experience
            <input name="experience" type="number">
        </label>
        <button type="submit">Save</button>
    </form>
</body>
</html>