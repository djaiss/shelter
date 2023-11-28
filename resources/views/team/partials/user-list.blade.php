@foreach ($data['team']['users'] as $user)
<div class="text-sm px-2 py-1 first:border-t-0 border-b hover:bg-blue-50 dark:hover:bg-gray-600">
  {{ $user['name'] }}
</div>
@endforeach
