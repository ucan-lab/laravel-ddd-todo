<h2>新しいタスク</h2>
<form class="create-task-form" action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="name">
    <label>期日<input type="date" name="dueDate" value="{{ now()->format('Y-m-d') }}"></label>
    <button type="submit">登録</button>
</form>
