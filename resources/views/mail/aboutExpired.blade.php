<h4>Dear {{$data->account->fullname}}</h4>

<p>Memorial Library provide the following information about borrowed books:</p>
<table border="1">
    <tr>

        <th style="padding-right: 15px;">Book title</th>
        <th style="padding-right: 15px;">Author</th>
        <th style="padding-right: 15px;">Start date</th>
        <th style="padding-right: 15px; color: red">Expiration date</th>

    </tr>


    <tr>
        <td>{{$data->book->title}}</td>
        <td>{{$data->book->author}}</td>
        <td>{{$data->borrowed_From}}</td>
        <td style="color: red">{{$data->expiration_Date}}</td>
    </tr>
</table>

<p style="font-weight: bold">Please return the book before <span style="color: red">{{$data->expiration_Date}}</span>, otherwise you have to pay fines according to the regulations of the library and your account will be locked!</p>
<p><i>If you have any questions please send  email to memoriallibrary123@gmail.com!</i></p>
<p>Thank you!</p>
