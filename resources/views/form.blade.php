<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Form</h1>
    <form action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name"><br><br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <label for="age">Enter Age</label>
        <input type="text" id="age" name="age"><br><br>
        @error('age')
            <p>{{ $message }}</p>
        @enderror
        <label for="date">Date</label>
        <input type="date" name="date" id="date"><br><br>
        @error('date')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="image" id="image" accept="image/*" multiple><br><br>
        @error('image')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Submit</button>
    </form>
</body>

</html>
