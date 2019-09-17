@extends('english.layouts.master')

@section('content')
<form id="form" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <h5>Please register here by filling the below info, you will receive a confirmation mail and the payment link once the below is filled. make sure your email is correct.</h5>

 <!-- Nardine: redirection url -->
<input type=hidden name="retURL" value="{{route('en.home.index')}}?redirect=1">

    @foreach ($event->form->elements()->where('active', 1)->where('label', 'not like', "%child%")->get() as $element)
        @if($element->type == 'hidden')
            <input type=hidden name="{{$element->name}}" id="{{$element->id_attribute}}" value="{{$element->value}}">

        @elseif($element->type == 'text')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="text" @if($element->required) required @endif autocomplete="off"/><br>

        @elseif($element->type == 'password')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="password" @if($element->required) required @endif autocomplete="off"/><br>

        @elseif($element->type == 'select')
            <label>{{$element->label}}</label>
            <select  id="{{$element->id_attribute}}" name="{{$element->name}}" title="{{$element->label}}" class="required" @if($element->required) required @endif>

                @foreach ($element->options()->where('active', 1)->get() as $option)
                    <option value="{{$option->value}}" @if ($option->default) selected @endif>{{$option->text}}</option>
                @endforeach

            </select><br>
        @elseif($element->type == 'date')
            <label>{{$element->label}}</label>
            <span class="dateInput dateOnlyInput">
                <input  id="{{$element->id_attribute}}" class="date" name="{{$element->name}}" size="12" type="text" @if($element->required) required @endif/>
            </span>
            <br>

        @endif
    @endforeach

    <!-- Nardine: Package options are changed from one event to the other --> <!-- will be a drop down -->
    @if($event->form->elements()
        ->where('active', 1)->
        where(function ($q) {
            $q->where('label', 'like', "%child 1%")
                ->orwhere('label', 'like', "%child 2%");
            })
        ->first()
        )
        <label for="Package used">How many child</label>

        <select  id="00N4J000006gBfd" class="required package " name="00N4J000006gBfd" title="Package used" required>
            <option value="">--None--</option>
            @if(!$event->form->elements()->where('active', 1)->where('label', 'like', "%child 1%")->get()->isEmpty())
                <option value="a114J00000066SfQAI">one child</option>
            @endif
            @if(!$event->form->elements()->where('active', 1)->where('label', 'like', "%child 2%")->get()->isEmpty())
                <option value="a114J00000066SgQAI">two children</option>
            @endif
        </select><br>
    @endif

<!-- Nardine: Children fields will be available to fill according to the number of children chosen first -->

<!------------------ 1st child start ----------------->
<div class="one-child d-none">
    @foreach ($event->form->elements()->where('active', 1)->where('label', 'like', "%child 1%")->get() as $element)
        @if($element->type == 'hidden')
            <input type=hidden name="{{$element->name}}" id="{{$element->id_attribute}}" value="{{$element->value}}">

        @elseif($element->type == 'text')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="text" @if($element->required) required @endif autocomplete="off"/><br>

        @elseif($element->type == 'password')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="password" @if($element->required) required @endif autocomplete="off"/><br>

        @elseif($element->type == 'select')
            <label>{{$element->label}}</label>
            <select  id="{{$element->id_attribute}}" name="{{$element->name}}" title="{{$element->label}}" class="required" @if($element->required) required @endif>

                @foreach ($element->options()->where('active', 1)->get() as $option)
                    <option value="{{$option->value}}" @if ($option->default) selected @endif>{{$option->text}}</option>
                @endforeach

            </select><br>
        @elseif($element->type == 'date')
            <label>{{$element->label}}</label>
            <span class="dateInput dateOnlyInput">
                <input  id="{{$element->id_attribute}}" class="date" name="{{$element->name}}" size="12" type="text" @if($element->required) required @endif/>
            </span>
            <br>

        @endif
    @endforeach
</div>


<!------------------ 2nd child start ----------------->
<div class="two-child d-none">
    @foreach ($event->form->elements()->where('active', 1)->where('label', 'like', "%child 2%")->get() as $element)
        @if($element->type == 'hidden')
            <input type=hidden name="{{$element->name}}" id="{{$element->id_attribute}}" value="{{$element->value}}">

        @elseif($element->type == 'text')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="text" @if($element->required) required @endif autocomplete="off"/><br>

        @elseif($element->type == 'password')
            <label for="{{$element->id_attribute}}">{{$element->label}}</label>
            <input  id="{{$element->id_attribute}}" class="required" maxlength="255" name="{{$element->name}}" size="20" type="password" @if($element->required) required @endif autocomplete="off"/><br>

        @elseif($element->type == 'select')
            <label>{{$element->label}}</label>
            <select  id="{{$element->id_attribute}}" name="{{$element->name}}" title="{{$element->label}}" class="required" @if($element->required) required @endif>

                @foreach ($element->options()->where('active', 1)->get() as $option)
                    <option value="{{$option->value}}" @if ($option->default) selected @endif>{{$option->text}}</option>
                @endforeach

            </select><br>
        @elseif($element->type == 'date')
            <label>{{$element->label}}</label>
            <span class="dateInput dateOnlyInput">
                <input  id="{{$element->id_attribute}}" class="date" name="{{$element->name}}" size="12" type="text" @if($element->required) required @endif/>
            </span>
            <br>

        @endif
    @endforeach

</div>

<!--Nardine: Payment options might be added, still not confirmed -->


    <input id="submit" type="submit" name="submit">

</form>
@endsection
@section('custom-css')
    <link href="{{asset('assets')}}/css/forms.css" rel="stylesheet" type="text/css">
@endsection
