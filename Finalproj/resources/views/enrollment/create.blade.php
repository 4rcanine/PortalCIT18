<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-semibold mb-4">Enrollment for {{ $program->name }}</h2>
                    <p class="mb-6 text-gray-600 dark:text-gray-400">Select the subjects you wish to enroll in for the upcoming term.</p>

                    @if($availableSubjects->isEmpty())
                        <p>No subjects currently available for your program.</p>
                    @else
                        {{-- Alpine.js component for managing selections and totals --}}
                        <div x-data="{
                            selectedSubjects: [],
                            {{-- Use @json directive for safety --}}
                            subjectsData: @json($availableSubjects->keyBy('id')->map(function($subject) {
                                return [
                                    'units' => $subject->units,
                                    'tuition_per_unit' => $subject->tuition_per_unit,
                                    'prereqs' => $subject->prerequisites->pluck('code')
                                ];
                            })),
                            get totalUnits() {
                                let total = 0;
                                this.selectedSubjects.forEach(id => {
                                    total += this.subjectsData[id] ? (this.subjectsData[id].units || 0) : 0;
                                });
                                return total;
                            },
                            get totalTuition() {
                                let total = 0;
                                this.selectedSubjects.forEach(id => {
                                    if(this.subjectsData[id]) {
                                        total += (this.subjectsData[id].units || 0) * (this.subjectsData[id].tuition_per_unit || 0);
                                    }
                                });
                                return total.toFixed(2);
                            }
                        }">
                            <form method="POST" action="{{ route('enrollment.store') }}">
                                @csrf
                                <div class="space-y-4">
                                    @foreach ($availableSubjects as $subject)
                                        <div class="flex items-center p-4 border dark:border-gray-700 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <input type="checkbox"
                                                   name="subjects[]"
                                                   {{-- Corrected: Generate ID directly with Blade --}}
                                                   id="subject_{{ $subject->id }}"
                                                   value="{{ $subject->id }}"
                                                   x-model="selectedSubjects"
                                                   class="h-5 w-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">

                                            {{-- Corrected: Generate 'for' directly with Blade --}}
                                            <label for="subject_{{ $subject->id }}" class="ml-3 flex-grow">
                                                <div class="font-medium">{{ $subject->name }} ({{ $subject->code }})</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    Units: {{ $subject->units }} |
                                                    Cost: ${{ number_format($subject->units * $subject->tuition_per_unit, 2) }}
                                                    {{-- Prerequisite Display --}}
                                                    @if($subject->prerequisites->isNotEmpty())
                                                        <span class="ml-2 text-red-500">(Prereqs: {{ $subject->prerequisites->pluck('code')->implode(', ') }})</span>
                                                        {{-- TODO: Add logic to disable checkbox if prereqs not met --}}
                                                    @endif
                                                </div>
                                                @if($subject->description)
                                                    <div class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $subject->description }}</div>
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Summary Section --}}
                                <div class="mt-6 p-4 border-t dark:border-gray-700">
                                    <h3 class="text-lg font-semibold mb-2">Enrollment Summary</h3>
                                    <p>Total Units Selected: <strong x-text="totalUnits">0</strong></p>
                                    <p>Estimated Tuition: <strong x-text="'$' + totalTuition">$0.00</strong></p>
                                    <p class="mt-2 text-sm text-yellow-600 dark:text-yellow-400">Note: This is an estimated cost. The final balance must be settled face-to-face at the cashier's office.</p>
                                </div>

                                {{-- Submit Button --}}
                                <div class="mt-6 flex justify-end">
                                     {{-- Disable button if selectedSubjects array is empty --}}
                                     <x-primary-button x-bind:disabled="selectedSubjects.length === 0">
                                         {{ __('Lock Subjects & Proceed') }}
                                     </x-primary-button>
                                </div>
                            </form>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>