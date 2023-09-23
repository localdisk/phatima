<div>
    <x-card title="Administrator List" shadow separator class="w-full shadow-md">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col">
                            id
                        </th>
                        <th scope="col">
                            name
                        </th>
                        <th scope="col">
                            email
                        </th>
                        <th scope="col">
                            created at
                        </th>
                        <th scope="col">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row">
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->created_at }}
                            </td>
                            <td class="flex items-center space-x-3">
                                <a href="#" class="font-medium link link-primary">
                                    <x-icon name="o-pencil-square" />
                                </a>
                                <a href="#" class="font-medium link link-error">
                                    <x-icon name="o-trash" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8">
            {{ $users->links() }}
        </div>
    </x-card>

</div>
