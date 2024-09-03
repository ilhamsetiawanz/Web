@extends('layouts.dblayouts')

@section('title', 'Dashboard')

@section('content')
    <div>lol</div>
    <div class="card h-full">
        <div class="card-body">
            <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Transaction</h4>
            <div class="relative overflow-x-auto">
                <!-- table -->
                <table class="text-left w-full whitespace-nowrap text-sm">
                    <thead class="text-gray-700">
                        <tr class="font-semibold text-gray-600">
                            <th scope="col" class="p-4">Id</th>
                            <th scope="col" class="p-4">Assigned</th>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Priority</th>
                            <th scope="col" class="p-4">Budget</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-4 font-semibold text-gray-600 ">1</td>
                            <td class="p-4">
                                  <div class="flex flex-col gap-1">
                                      <h3 class=" font-semibold text-gray-600">Sunil Joshi</h3>
                                      <span class="font-normal text-gray-500">Web Designer</span>
                                  </div>
                            </td>
                            <td class="p-4">
                                <span class="font-normal  text-gray-500">Elite Admin</span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold bg-blue-600 text-white">Low</span>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-base text-gray-600">$3.9</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-semibold text-gray-600 ">2</td>
                            <td class="p-4">
                                  <div class="flex flex-col gap-1">
                                      <h3 class="font-semibold text-gray-600">Andrew McDownland</h3>
                                      <span class="font-normal text-gray-500">Project Manager</span>
                                  </div>
                            </td>
                            <td class="p-4">
                                <span class="font-normal text-gray-500">Real Homes WP Theme</span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-cyan-500">Medium</span>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-base text-gray-600">$24.5k</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-semibold text-gray-600 ">3</td>
                            <td class="p-4">
                                  <div class="flex flex-col gap-1">
                                      <h3 class="font-semibold text-gray-600">Christopher Jamil</h3>
                                      <span class="font-normal text-sm text-gray-500">Project Manager</span>
                                  </div>
                            </td>
                            <td class="p-4">
                                <span class="font-normal text-gray-500">MedicalPro WP Theme</span>
                            </td>
                            <td class="p-4 ">
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">High</span>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-base text-gray-600">$12.8k</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-semibold text-gray-600 ">4</td>
                            <td class="p-4">
                                  <div class="flex flex-col gap-1">
                                      <h3 class="font-semibold text-gray-600">Nirav Joshi</h3>
                                      <span class="font-normal text-sm text-gray-500">Frontend Engineer</span>
                                  </div>
                            </td>
                            <td class="p-4">
                                <span class="font-normal text-sm text-gray-500">Hosting Press HTML</span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-teal-500">Critical</span>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-base text-gray-600">$2.4k</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>									
        </div>
    </div>
    
@endsection
