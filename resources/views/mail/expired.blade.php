<h4>Dear {{$data[0]->account->fullname}}</h4>

<p>Memorial Library provide the following information about borrowed books:</p>
<table border="1">
    <tr>
        <th style="padding-right: 15px;">No</th>
        <th style="padding-right: 15px;">Book title</th>
        <th style="padding-right: 15px;">Price</>
        <th style="padding-right: 15px;">Penalty fee </th>
    </tr>
    <?php $i=1;$t=0; ?>
    @foreach ($data as $d)

    <tr>
        <td>{{$i++}}</td>
        <td>{{$d->book->title}}</td>
        <td>{{$d->book->price}}</td>
        <td>{{round(($d->book->price)*0.1,3)}}</td>
        <?php $t=$t + ($d->book->price)*0.1?>
    </tr>
    @endforeach
    <tr>
        <td colspan="3">Tax(10%)</td>
        <td>{{round($t*0.1,3)}}</td>
    </tr>
    <tr>
        <td colspan="3">Total</td>
        <td>{{$total}}</td>
    </tr>
</table>
<p style="color: red">Expiration date: {{$data[0]->expiration_Date}}</p>
<p style="font-weight: bold">Please return the book and prepare the money of ${{$total}} to pay the penalty fee! </p>
<p><i>If you have any questions please send  email to memoriallibrary123@gmail.com!</i></p>
<p>Thank you!</p>
