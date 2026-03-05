@extends('layouts.admin') {{-- 假設妳有後台基底模板 --}}

@section('content')
<div class="container mt-4">
    <h2>會員管理系統</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover border">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>Email</th>
                <th>目前等級 (Level)</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge {{ $user->level == 'Gold' ? 'bg-warning' : 'bg-info' }}">
                        {{ $user->level }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('admin.users.updateLevel', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <select name="level" onchange="this.form.submit()"
                            class="form-select form-select-sm d-inline-block w-auto">
                            <option value="Normal" {{ $user->level == 'Normal' ? 'selected' : '' }}>一般會員</option>
                            <option value="Silver" {{ $user->level == 'Silver' ? 'selected' : '' }}>銀卡會員</option>
                            <option value="Gold" {{ $user->level == 'Gold' ? 'selected' : '' }}>金卡會員</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }} {{-- 分頁按鈕 --}}
</div>
@endsection