<h2>{{ __('views.tasks._create_form.title') }}</h2>
<form class="create-task-form" action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="name">
    <label>{{ __('views.tasks._create_form.due_date') }}<input type="date" name="dueDate" value="{{ now()->format('Y-m-d') }}"></label>
    <button type="submit">{{ __('views.tasks._create_form.store') }}</button>
</form>
