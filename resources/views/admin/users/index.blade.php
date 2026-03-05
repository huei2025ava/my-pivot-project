@extends('layouts.admin')

@section('content')

<style>
:root {
    --cream: #fdf6ee;
    --warm-brown: #7a5c44;
    --dark-brown: #3e2c1e;
    --accent: #d4886a;
    --border: #e8d8c8;
    --text-soft: #8c7060;
    --white: #fffdf9;
}

/* ── Page title ── */
.page-header-title {
    font-family: 'Noto Serif TC', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--dark-brown);
    letter-spacing: 2px;
}

/* ── Table wrapper ── */
.users-table-wrap {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border);
    box-shadow: 0 4px 16px rgba(62, 44, 30, 0.07);
}

/* ── Table ── */
.users-table {
    margin-bottom: 0;
    width: 100%;
    border-collapse: collapse;
}

.users-table thead tr {
    background-color: var(--dark-brown);
}

.users-table thead th {
    color: #f0e4d4;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 16px 20px;
    border: none;
    white-space: nowrap;
}

.users-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background-color 0.15s;
}

.users-table tbody tr:last-child {
    border-bottom: none;
}

.users-table tbody tr:hover {
    background-color: var(--cream);
}

.users-table tbody td {
    padding: 15px 20px;
    font-size: 13.5px;
    color: var(--dark-brown);
    vertical-align: middle;
    border: none;
}

/* ID cell */
.td-id {
    font-size: 12px;
    color: var(--text-soft);
    font-weight: 600;
    width: 60px;
}

/* Avatar + name */
.user-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background-color: var(--warm-brown);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 700;
    margin-right: 10px;
    flex-shrink: 0;
}

.user-name-cell {
    display: flex;
    align-items: center;
}

.user-email {
    font-size: 12px;
    color: var(--text-soft);
    margin-top: 1px;
}

/* ── Level badges ── */
.level-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 4px 12px;
    text-transform: uppercase;
}

.level-gold {
    background: #fff8e1;
    color: #b8860b;
    border: 1px solid #f5d87a;
}

.level-silver {
    background: #f2f2f2;
    color: #666;
    border: 1px solid #ccc;
}

.level-normal {
    background: var(--cream);
    color: var(--text-soft);
    border: 1px solid var(--border);
}

/* ── Level select ── */
.level-select {
    appearance: none;
    -webkit-appearance: none;
    background-color: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    color: var(--dark-brown);
    font-size: 12px;
    padding: 6px 28px 6px 14px;
    cursor: pointer;
    outline: none;
    transition: border-color 0.2s;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%238c7060'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    min-width: 110px;
}

.level-select:focus,
.level-select:hover {
    border-color: var(--warm-brown);
}

/* ── Alert ── */
.alert-success-custom {
    background: #edf7ed;
    border: 1px solid #b7ddb7;
    border-radius: 10px;
    color: #2d6a2d;
    font-size: 13px;
    padding: 12px 20px;
    margin-bottom: 24px;
}

/* ── Stat summary bar ── */
.stat-bar {
    display: flex;
    gap: 16px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}

.stat-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 10px 20px;
    font-size: 13px;
    color: var(--dark-brown);
    box-shadow: 0 2px 8px rgba(62, 44, 30, 0.06);
}

.stat-pill .stat-num {
    font-family: 'Noto Serif TC', serif;
    font-size: 18px;
    font-weight: 600;
}

.stat-pill .stat-label {
    font-size: 11px;
    color: var(--text-soft);
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* ── Pagination ── */
.pagination .page-link {
    border: 1px solid var(--border);
    color: var(--warm-brown);
    font-size: 13px;
    padding: 7px 13px;
    border-radius: 8px !important;
    margin: 0 2px;
    transition: all 0.2s;
}

.pagination .page-link:hover {
    background-color: var(--cream);
    border-color: var(--warm-brown);
    color: var(--dark-brown);
}

.pagination .page-item.active .page-link {
    background-color: var(--dark-brown);
    border-color: var(--dark-brown);
    color: #fff;
}

.pagination .page-item.disabled .page-link {
    color: #ccc;
    border-color: var(--border);
}
</style>

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
    <h2 class="page-header-title mb-0">會員管理</h2>
</div>

@if(session('success'))
<div class="alert-success-custom">
    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
</div>
@endif

{{-- ── Stat bar ── --}}
<div class="stat-bar">
    <div class="stat-pill">
        <i class="fas fa-users" style="color:var(--warm-brown);font-size:16px;"></i>
        <div>
            <div class="stat-num">{{ $users->total() }}</div>
            <div class="stat-label">總會員數</div>
        </div>
    </div>
    <div class="stat-pill">
        <i class="fas fa-crown" style="color:#b8860b;font-size:16px;"></i>
        <div>
            <div class="stat-num">{{ $users->where('level','Gold')->count() }}</div>
            <div class="stat-label">金卡會員</div>
        </div>
    </div>
    <div class="stat-pill">
        <i class="fas fa-medal" style="color:#888;font-size:16px;"></i>
        <div>
            <div class="stat-num">{{ $users->where('level','Silver')->count() }}</div>
            <div class="stat-label">銀卡會員</div>
        </div>
    </div>
</div>

{{-- ── Table ── --}}
<div class="users-table-wrap">
    <table class="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>會員</th>
                <th>Email</th>
                <th>等級</th>
                <th>調整等級</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="td-id">{{ $user->id }}</td>

                <td>
                    <div class="user-name-cell">
                        <div class="user-avatar">
                            {{ mb_substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <div style="font-weight:600;">{{ $user->name }}</div>
                        </div>
                    </div>
                </td>

                <td style="color:var(--text-soft); font-size:13px;">{{ $user->email }}</td>

                <td>
                    @if($user->level == 'Gold')
                    <span class="level-badge level-gold">
                        <i class="fas fa-crown" style="font-size:10px;"></i> 金卡
                    </span>
                    @elseif($user->level == 'Silver')
                    <span class="level-badge level-silver">
                        <i class="fas fa-medal" style="font-size:10px;"></i> 銀卡
                    </span>
                    @else
                    <span class="level-badge level-normal">
                        一般
                    </span>
                    @endif
                </td>

                <td>
                    <form action="{{ route('admin.users.updateLevel', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <select name="level" onchange="this.form.submit()" class="level-select">
                            <option value="Normal" {{ $user->level == 'Normal' ? 'selected' : '' }}>一般會員</option>
                            <option value="Silver" {{ $user->level == 'Silver' ? 'selected' : '' }}>銀卡會員</option>
                            <option value="Gold" {{ $user->level == 'Gold'   ? 'selected' : '' }}>金卡會員</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- ── Pagination ── --}}
@if($users->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $users->links() }}
</div>
@endif

@endsection