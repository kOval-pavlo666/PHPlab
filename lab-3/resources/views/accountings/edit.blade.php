
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit</title>

    <style>
    </style>
</head>
<body class="antialiased">
<form action="/accountings/{{$accounting->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <label for="">
        FullName
        <input name="fullName" type="text" value="{{$accounting->fullName}}">
    </label>
    <label for="">
        Position
        <input name="position" type="text" value="{{$accounting->position}}">
    </label>
    <label for="">
        Salary
        <input name="salary" type="number" value="{{$accounting->salary}}">
    </label>
    <label for="">
        ChildrenQuantity
        <input name="childrenQuantity" type="number" value="{{$accounting->childrenQuantity}}">
    </label>
    <label for="">
        Experience
        <input name="experience" type="number" value="{{$accounting->experience}}">
    </label>
    <button type="submit">Save</button>
</form>
</body>
</html>