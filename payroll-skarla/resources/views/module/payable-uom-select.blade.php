<?php
$uomList  = [
    ["code" => "MON", "display_name" => "Month"],
    ["code" => "DAY", "display_name" => "Day"],
    ["code" => "HR", "display_name" => "Hour"],
    ["code" => "MIN", "display_name" => "Minute"],
    ["code" => "EA", "display_name" => "Exact Amount"],
];
?>

<select name="{{$name or "uom"}}" class="form-control selectpicker" {{$required ? "required" : ""}} data-live-search="true">
    @foreach($uomList AS $uom)
    <?php $selected = $value == $uom["code"] ? "selected" : "" ?>
    <option {{$selected}} value="{{$uom["code"]}}">{{$uom["display_name"]}}</option>
    @endforeach
</select>