<h4>Dear {{$customer->fullname}}</h4>
<p>Thank you for borrowing books at our library</p>
<p>Memorial Library provide the following information about borrowing books:</p>
<table border="1">
    <tr>
        <th style="padding-right: 15px;">No</th>
        <th style="padding-right: 15px;">Book title</th>
        <th style="padding-right: 15px;">Author</th>
    </tr>
    @foreach ($book as $b)
    <?php $i=1 ?>
    <tr>
        <td>{{$i++}}</td>
        <td>{{$b->title}}</td>
        <td>{{$b->author}}</td>
    </tr>
    @endforeach
</table>
<p>Borrowed date: {{$start}}</p>
<p style="color: red">Expiration date {{$end}}</p>
<p style="font-weight: bold">Please return the book before the expiration date, otherwise you have to pay fines according to the regulations of the library and your account will be locked!</p>
<p><i>If you have any questions please send  email to memoriallibrary123@gmail.com!</i></p>
<p>Thank you!</p>
