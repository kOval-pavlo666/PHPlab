<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Вся таблиця даних</h1>
    <table border="1">
        <tr>
            <td>FullName</td>
            <td>Position</td>
            <td>Salary</td>
            <td>ChildrenQuantity</td>
            <td>Experience</td>
            <td>Show Btn</td>
            <td>Edit Btn</td>
            <td>Delete Btn</td>
        </tr>
        @foreach($accountings as $accounting)
            <tr>
                <td>{{$accounting->fullName}}</td>
                <td>{{$accounting->position}}</td>
                <td>{{$accounting->salary}}</td>
                <td>{{$accounting->cildrenQuantity}}</td>
                <td>{{$accounting->experience}}</td>
                <td><a href="/accountings/{{$accounting->id}}">Show</a></td>
                <td><a href="/accountings/{{$accounting->id}}/edit">Edit</a></td>
                <td><a onclick="event.preventDefault(); document.getElementById('delete-form-{{$accounting->id}}').submit();">Delete
                    <form id="delete-form-{{$accounting->id}}" action="/accountings/{{$accounting->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </a></td>
            </tr>
        @endforeach
    </table>
    <button><a href="/accountings/create">Create</a></button>
</body>
</html>