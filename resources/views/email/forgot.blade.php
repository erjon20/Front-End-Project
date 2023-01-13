<h1>Hello {{$user->username}}</h1>

<p>
    Pleasse click the link to reset your password

    <a href={{ url('/new_password/'.$user->email.'/'.$code) }}> Reset password </a>

</p>