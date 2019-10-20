@extends('layouts.app')

@section('content')
    <ais-instant-search :search-client="searchClient" index-name="games">
        <div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/4">
                    <ais-search-box placeholder="Søg efter spil..." :class-names="{
                            'ais-SearchBox': 'mb-8',
                            'ais-SearchBox-input': 'bg-white text-gray-800 border-2 border-gray-300 px-4 py-3 rounded focus:border-blue-400 font-sans w-full',
                            'ais-SearchBox-submit': 'hidden',
                            'ais-SearchBox-reset': 'hidden',
                        }"
                    ></ais-search-box>

                    <ais-configure :hits-per-page.camel="25"/>

                    <div>
                        <div class="uppercase block font-medium text-sm text-gray-600 pb-3">Krediteringer</div>
                        <ais-refinement-list attribute="contributors.name" :limit="5" :show-more="true" :class-names="{
                            'ais-RefinementList': 'mb-10',
                            'ais-RefinementList-checkbox': 'ml-2 mr-4',
                            'ais-RefinementList-label': 'block flex items-center justify-between border-t py-2 select-none hover:bg-gray-200 cursor-pointer',
                            'ais-RefinementList-labelText': 'flex-1 text-sm truncate',
                            'ais-RefinementList-count': 'bg-blue-100 text-blue-400 px-2 rounded-lg text-sm',
                            'ais-RefinementList-showMore': 'text-sm mt-2 focus:outline-none',
                        }"/>
                    </div>

                    <div>
                        <div class="uppercase block font-medium text-sm text-gray-600 pb-3">Udgivere</div>
                        <ais-refinement-list attribute="publishers.name" :limit="5" :show-more="true" :class-names="{
                            'ais-RefinementList': 'mb-10',
                            'ais-RefinementList-checkbox': 'ml-2 mr-4',
                            'ais-RefinementList-label': 'block flex items-center justify-between border-t py-2 select-none hover:bg-gray-200 cursor-pointer',
                            'ais-RefinementList-labelText': 'flex-1 text-sm truncate',
                            'ais-RefinementList-count': 'bg-blue-100 text-blue-400 px-2 rounded-lg text-sm',
                            'ais-RefinementList-showMore': 'text-sm mt-2 focus:outline-none',
                        }"/>
                    </div>

                    <div>
                        <div class="uppercase block font-medium text-sm text-gray-600 pb-12">Udgivelsesperiode</div>

                        <ais-range-input attribute="published_year">
                            <div slot-scope="{ currentRefinement, range, refine }">
                            <vue-slider :min="range.min"
                                        :max="range.max"
                                        :lazy="true"
                                        :value="toValue(currentRefinement, range)"
                                        :dot-options="{ tooltip: 'always' }"
                                        @change="refine({ min: $event[0], max: $event[1] })"
                            />
                            </div>
                        </ais-range-input>
                    </div>
                </div>

                <ais-hits :class-names="{
                    'ais-Hits': 'w-full px-6 md:w-3/4 md:pl-8 md:pr-0',
                    'ais-Hits-list': '',
                    'ais-Hits-item': 'w-full block mb-3'
                }">
                    <template slot="item" slot-scope="{ item }">
                        <a :href="'/games/' + item.id" class="w-full block bg-white border px-6 py-4 rounded hover:border-gray-500">
                            <div class="flex items-center justify-between mb-1">
                                <div class="font-semibold text-md tracking-wide">@{{ item.title }}</div>
                                <div class="text-sm flex items-center" v-if="item.published_year != 'unknown'">
                                    <svg class="w-3 h-3 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-7.59V4h2v5.59l3.95 3.95-1.41 1.41L9 10.41z"/></svg>

                                    <div>@{{ item.published_year }}</div>
                                </div>
                            </div>

                            <div class="text-sm text-gray-600">
                                <span v-if="item.notes">@{{ item.notes }}</span>
                                <span v-else class="italic">No notes</span>
                            </div>

                            <div class="mt-4">
                                <div v-for="contributor in item.contributors" class="inline-block text-xs bg-blue-100 text-blue-500 py-1 px-3 rounded-lg">@{{ contributor.name }}</div>
                                <div v-for="publisher in item.publishers" class="inline-block text-xs bg-green-100 text-green-500 py-1 px-3 rounded-lg">@{{ publisher.name }}</div>
                            </div>
                        </a>
                    </template>
                </ais-hits>
            </div>
        </div>
    </ais-instant-search>
@endsection