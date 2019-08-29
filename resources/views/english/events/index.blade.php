@extends('english.layouts.master')

@section('content')
<form id="form" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <h5>Please register here by filling the below info, you will receive a confirmation mail and the payment link once the below is filled. make sure your email is correct.</h5>

 <!-- Nardine: redirection url -->
<input type=hidden name="retURL" value="{{route('en.home.index')}}?redirect=1">

    @foreach ($event->form->elements()->where('active', 1)->get() as $element)
        @if($element->type == 'hidden')
            <input type=hidden name="{{$element->name}}" id="{{$element->id_attribute}}" value="{{$element->value}}">

        @elseif($element->type == 'text')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="text" required autocomplete="off"/><br>

        @elseif($element->type == 'password')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="password" required autocomplete="off"/><br>

        @elseif($element->type == 'select')
            <label>{{$element->label}}</label>
            <select  id="{{$element->id_attribute}}" name="{{$element->name}}" title="{{$element->label}}" class="required" required>

                @foreach ($element->options()->where('active', 1)->get() as $option)
                    <option value="{{$option->value}}" @if ($option->default) selected @endif>{{$option->text}}</option>
                @endforeach

            </select><br>
        @endif
    @endforeach


<!-- Nardine: Children fields will be available to fill according to the number of children chosen first -->

<!------------------ 1st child start ----------------->
<div class="one-child d-none">
    <label for="Child 1 Name">Child 1 Name:</label>
    <input  id="00N4J000006gBfS" maxlength="255" name="00N4J000006gBfS" size="20" type="text" /><br>



    <label for="Child 1 DOB">Child 1 Date of birth:</label>
    <span class="dateInput dateOnlyInput">
<input  id="00N4J000006gBfQ" name="00N4J000006gBfQ" size="12" class="date" type="text" /></span><br>

    <label for="Child 1 T-Shirt">Child 1 T-Shirt size:</label>
    <select  id="00N4J000006gBfy" name="00N4J000006gBfy" title="Child 1 T-Shirt">
    <option value="">--None--</option>
    <option value="6">6</option>
    <option value="8">8</option>
    <option value="10">10</option>
    <option value="12">12</option>
    <option value="14">14</option>
    <option value="16">16</option>
    </select><br>

    <label for="Child 1 Gender">Child 1 Gender:</label>
    <select  id="00N4J000006gBfR" name="00N4J000006gBfR" title="Child 1 Gender" >
        <option value="">--None--</option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
    </select><br>

    <label for="Child 1 School:">Child 1 School:</label>
    <input  id="00N4J000006gBfT" maxlength="255" name="00N4J000006gBfT" size="20" type="text" /><br>

    <label for="Child 1 Allergies:">Child 1 Allergies:</label>
    <input  id="00N4J000006gBfP" maxlength="255" name="00N4J000006gBfP" size="20" type="text" /><br>

</div>


<!------------------ 2nd child start ----------------->
<div class="two-child d-none">
    <label for="Child 2 Name">Child 2 Name:</label>
    <input  id="00N4J000006gBfY" maxlength="255" name="00N4J000006gBfY" size="20" type="text" /><br>

    <label for="Child 2 DOB">Child 2 Date of birth:</label>
    <span class="dateInput dateOnlyInput">
<input  id="00N4J000006gBfW" name="00N4J000006gBfW" size="12" class="date" type="text" /></span><br>

    <label for="Child 2 T-Shirt">Child 2 T-Shirt size:</label>
    <select  id="00N4J000006gBg3" name="00N4J000006gBg3" title="Child 2 T-Shirt">
    <option value="">--None--</option>
    <option value="6">6</option>
    <option value="8">8</option>
    <option value="10">10</option>
    <option value="12">12</option>
    <option value="14">14</option>
    <option value="16">16</option>
    </select><br>

    <label for="Child 2 Gender">Child 2 Gender:</label>
    <select  id="00N4J000006gBfX" name="00N4J000006gBfX" title="Child 2 Gender">
    <option value="">--None--</option>
    <option value="Female">Female</option>
    <option value="Male">Male</option>
    </select><br>

    <label for="Child 2 School">Child 2 School:</label>
    <input  id="00N4J000006gBfZ" maxlength="255" name="00N4J000006gBfZ" size="20" type="text" /><br>

    <label for="Child 2 Allergies">Child 2 Allergies:</label>
    <input  id="00N4J000006gBfV" maxlength="255" name="00N4J000006gBfV" size="20" type="text" /><br>


</div>

<!--Nardine: Payment options might be added, still not confirmed -->


    <input id="submit" type="submit" name="submit">

</form>
@endsection
@section('custom-css')
    <link href="{{asset('assets')}}/css/forms.css" rel="stylesheet" type="text/css">
@endsection
