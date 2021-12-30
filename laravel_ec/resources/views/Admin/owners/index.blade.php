<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      オーナー一覧
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <section class="text-gray-600 body-font">
            <div class="container px-5 mx-auto">
              <div class="flex justify-end mb-4">
                <button onclick="location.href='{{ route('admin.owners.create') }}'"
                  class="text-white bg-indigo-500 border-0 py-2 px-16 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録</button>
              </div>
              <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                  <thead>
                    <tr>
                      <th
                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                        ユーザー名</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        メールアドレス</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        前回のログイン</th>
                    </tr>
                  </thead>
                  @foreach ($owners as $owner )
                  <tbody>
                    <tr>
                      <td class="border-b-2 border-gray-200 px-4 py-3 text-center"> {{ $owner->name }}</td>
                      <td class="border-b-2 border-gray-200 px-4 py-3 text-center"> {{ $owner->email }}</td>
                      <td class="border-b-2 border-gray-200 px-4 py-3 text-center"> {{
                        $owner->created_at->diffForHumans() }} <br>
                      <td class="w-10 text-center">
                        <input name="plan" type="radio">
                      </td>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </section>

          {{-- エロクアント <br>
          @foreach ($e_all as $e_owner )
          {{ $e_owner->name }}
          {{ $e_owner->created_at->diffForHumans() }}
          @endforeach
          <br>クエリビルダ <br>
          @foreach ($q_get as $q_owner )
          {{ $q_owner->name }}
          {{ Carbon\Carbon::parse($q_owner->created_at)->diffForHumans() }}
          @endforeach --}}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
