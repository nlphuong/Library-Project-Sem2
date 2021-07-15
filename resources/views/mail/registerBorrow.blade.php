<h4>Dear {{$customer->fullname}}</h4>
<p>Thank you for registering to borrow these books at our library</p>
<p>Memorial Library provides the following information about your borrowing books:</p>
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
<p style="color: red">Borrowing date: {{$start}}</p>
<p style="font-weight: bold">Please come to get the book in 24h from 0h the borrowing date, otherwise your order will be delete!</p>
<p><i>If you have any questions please send  email to memoriallibrary123@gmail.com!</i></p>
<p>Thank you!</p>
