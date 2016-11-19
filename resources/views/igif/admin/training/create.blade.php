@extends('layouts.dashboard')
@section('page_heading','Admin: Create Training Drills')
@section('section')

    <div class="col-sm-8">
        <div class="row">

            {!! Form::open(['method'=>'POST', 'action'=> 'Training\AdminTrainingController@store','files'=>true]) !!}
            {{ Form::hidden('category_name') }}
            {{ Form::hidden('training_units_of_length_name') }}
            {{ Form::hidden('training_measurement_type_name') }}

            {{--<div class="form-group">--}}
            {{--{!! Form::label('name', 'Name:') !!}--}}
            {{--{!! Form::text('name', null, ['class'=>'form-control'])!!}--}}
            {{--</div>--}}

            <div class="form-group">
                {!! Form::label('training_categories_id', 'Training Category:') !!}
                {!! Form::select('training_categories_id', $categories, null, ['class'=>'form-control'])!!}
            </div>

            {{--<div class="form-group">--}}
                {{--{!! Form::label('description', 'Name:') !!}--}}
                {{--{!! Form::textArea('description', null, ['class'=>'form-control', 'readonly'])!!}--}}
            {{--</div>--}}

            <div class="form-group">
                {!! Form::label('training_media_id', 'Training Media:') !!}
                {!! Form::file('training_media_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('attempts', 'Attempts:') !!}
                {!! Form::text('attempts', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('distance', 'Distance:') !!}
                {!! Form::text('distance', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_units_of_length_id', 'Unit of Length:') !!}
                {!! Form::select('training_units_of_length_id', ['' => 'Choose Options'] + $unitsoflength, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_measurement_type_id', 'Measurement Type:') !!}
                {!! Form::select('training_measurement_type_id', ['' => 'Choose Options'] + $measurementtypes, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('success_criteria', 'Success Criteria:') !!}
                {!! Form::text('success_criteria', null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::submit('Create Training Drill', ['class'=>'btn btn-primary']) !!}
            </div>

        </div>
    </div>

    {!! Form::close() !!}


    @include('includes.form_error')
<script>
    $("select[name=training_categories_id]").change(function(){
        $cat = $( "#training_categories_id option:selected" ).text();
        $("input[name=category_name]").val($cat);
    });
    $("select[name=training_units_of_length_id]").change(function(){
        $cat = $( "#training_units_of_length_id option:selected" ).text();
        $("input[name=training_units_of_length_name]").val($cat);
    });
    $("select[name=training_measurement_type_id]").change(function(){
        $cat = $( "#training_measurement_type_id option:selected" ).text();
        $("input[name=training_measurement_type_name]").val($cat);
    });
</script>


@stop
