@extends('layouts.app')

@section('title', 'إضافة مشرف جديد')

@section('content')
    <h1>إضافة مشرف جديد</h1>
    <form method="POST" action="{{ route('supervisors.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="full_name">الاسم الكامل</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
        <div class="form-group">
            <label for="email">الإيميل</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">باسورد</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="section_id">فرع</label>
            <select class="form-control" id="section_id" name="section_id" required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">مشرف الصورة</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
@endsection
