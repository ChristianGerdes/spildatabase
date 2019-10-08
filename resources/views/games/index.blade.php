@extends('layouts.app')

@section('content')
    <ais-instant-search :search-client="searchClient" index-name="games">
        <div>
            <div class="border-b pb-6 mb-6">
                <ais-state-results>
                    <div slot-scope="{ query, nbHits }">
                        <h1 class="text-4xl">@{{ query ? query : 'Search' }}</h1>
                        <div>@{{ nbHits }} resultater.</div>
                    </div>
                </ais-state-results>
            </div>

            <ais-search-box placeholder="Search articles..."></ais-search-box>

            <ais-configure :hits-per-page.camel="25"/>

            <div class="flex flex-wrap mt-12">
                <div class="w-full md:w-1/4">
                    <div>
                        <div class="uppercase block font-semibold pb-3">Contributors</div>
                        <ais-refinement-list attribute="credits.name" :class-names="{
                            'ais-RefinementList': 'mb-8',
                            'ais-RefinementList-checkbox': 'ml-2 mr-4',
                            'ais-RefinementList-label': 'block flex items-center justify-between border-t py-2 select-none hover:bg-gray-200 cursor-pointer',
                            'ais-RefinementList-labelText': 'flex-1 text-sm',
                            'ais-RefinementList-count': 'bg-blue-100 text-blue-400 px-2 rounded-lg text-sm'
                        }"/>
                    </div>

                    <div>
                        <div class="uppercase block font-semibold pb-3">Publishe year</div>
                        <ais-refinement-list attribute="published_year" :class-names="{
                            'ais-RefinementList': 'mb-8',
                            'ais-RefinementList-label': 'block flex items-center justify-between border-t py-2 select-none hover:bg-gray-200 cursor-pointer',
                            'ais-RefinementList-labelText': 'flex-1 ml-4 text-sm',
                            'ais-RefinementList-count': 'bg-blue-100 text-blue-400 px-2 rounded-lg text-sm'
                        }"/>
                    </div>
                </div>

                <ais-hits :class-names="{
                    'ais-Hits': 'w-full px-6 md:w-3/4 md:pl-8 md:pr-0',
                    'ais-Hits-list': 'flex flex-wrap -mx-2',
                    'ais-Hits-item': 'w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5'
                }">
                    <template slot="item" slot-scope="{ item }">
                        <a :href="'/games/' + item.id" class="block bg-white rounded-lg overflow-hidden shadow mx-2 mb-4 hover:shadow-md hover:text-gray-600">
                            <img src="https://store.playstation.com/store/api/chihiro/00_09_000/container/US/en/999/UP0001-CUSA01800_00-RB6SIEGESPULTI04/1567553387000/image?w=240&h=240&bg_color=000000&opacity=100&_version=00_09_000">
                            <div class="text-center uppercase py-3 text-xs">@{{ item.title }}</div>
                        </a>
                    </template>
                </ais-hits>
            </div>
        </div>
    </ais-instant-search>
@endsection