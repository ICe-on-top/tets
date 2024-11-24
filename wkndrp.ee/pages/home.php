
<div class="px-4">
    
    <div class="flex justify-between">
        <h1 class="pb-5 text-2xl font-semibold">Avaleht</h1>
        
        <div x-data="{show: false}"><button onClick="location.href=`fivem://connect/cfx.re/join/aq3vmk`" class="bg-sky-700 hover:bg-sky-800 px-4 text-white h-10 shadow rounded cursor-pointer">Liitu serveriga</button>
                    <button x-on:click="show = true" class="bg-sky-700 hover:bg-sky-800 px-4 text-white h-10 shadow rounded cursor-pointer">Uus karakter</button>

                    <div x-show="show" id="newCharacter" class="fixed top-0 inset-x-0 py-6 z-50">
                        <div class="flex justify-center overflow-y-auto overflow-x-hidden fixed w-full h-modal md:h-full">
                            <div x-show="show" class="fixed inset-0 transform transition-all z-50" x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <div class="absolute inset-0 bg-zinc-700 opacity-75"></div>
                            </div>
            
                            <div x-show="show" class="relative w-full max-w-xl md:max-w-2xl h-full md:h-auto z-50" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal content -->
                                <div class="relative bg-zinc-800 rounded shadow">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-start p-4 rounded-t border-b border-b border-zinc-700">
                                        <h3 class="text-xl font-semibold text-white">
                                            Karakteri loomine
                                        </h3>
            
                                        <button @click="show = false" type="button" class="text-zinc-400 bg-transparent hover:bg-zinc-700 hover:text-white rounded text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
            
                                    <!-- Modal body -->
                                    <div class="px-6 py-4 space-y-2">   
                                        <div>
                                            <label for="createFirstname" class="mb-2 block text-sm font-medium text-zinc-300">Eesnimi</label>
                                            <input maxlength="20" type="text" id="createFirstname" class="border border-zinc-700 bg-zinc-900 shadow text-zinc-300 text-sm rounded focus-none block p-2.5 w-full h-10" placeholder="Sisesta eesnimi">
                                        </div>
            
                                        <div>
                                            <label for="createLastname" class="mb-2 block text-sm font-medium text-zinc-300">Perekonnanimi</label>
                                            <input maxlength="20" type="text" id="createLastname" class="border border-zinc-700 bg-zinc-900 shadow text-zinc-300 text-sm rounded focus-none block p-2.5 w-full h-10" placeholder="Sisesta perekonnanimi">
                                        </div>
            
                                        <div>
                                            <label for="createDob" class="mb-2 block text-sm font-medium text-zinc-300">Sünnikuupäev</label>
                                            <input type="date" id="createDob" class="border border-zinc-700 bg-zinc-900 shadow text-zinc-300 text-sm rounded focus-none block p-2.5 w-full h-10" min="1900-01-01" max="2007-01-01">
                                        </div>
            
                                        <div>
                                            <label for="createSex" class="mb-2 block text-sm font-medium text-zinc-300">Sugu</label>
                                            <select id="createSex" class="border border-zinc-700 bg-zinc-900 shadow text-zinc-300 text-sm rounded focus-none block p-2.5 w-full h-10">
                                                <option value="m">Mees</option>
                                                <option value="f">Naine</option>
                                            </select>
                                        </div>
                                    </div>
            
                                    <!-- Modal footer -->
                                    <div class="md:flex md:justify-start p-6 rounded-b border-t border-b border-zinc-700 gap-1">
                                        <button onclick="createCharacter()" class="w-full mb-1 md:w-1/2 px-2 py-2 bg-zinc-600 hover:bg-zinc-700 text-white rounded" name="submit">Kinnita</button>
                                        <button @click="show = false"  class="w-full mb-1 md:w-1/2 px-2 py-2 hover:bg-zinc-700 text-white border border-zinc-700 rounded" name="submit">Katkesta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    </div>
    
    <div id="items" class="md:flex md:gap-1">
        <div id="characters" class="md:w-9/12 mb-1 md:mb-0">
            
                            <div class="flex text-center md:text-left md:flex mb-1">
                                <div class="bg-zinc-900 border border-zinc-700 md:flex w-1/2 p-2 rounded shadow ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden md:block m-auto ml-0 mr-0 w-16 h-16 text-zinc-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                
                                    <div class="mt-auto mb-auto">
                                        <p class="text-zinc-400 font-semibold text-xl">Tom Brown</p>
                                        <p class="text-sm font-semibold text-sky-800">Puudub - Puudub</p>
                                        <p class="text-sm text-zinc-500 font-semibold">2000-04-01</p>
                                    </div>
                                </div>  
                
                                <div class="bg-zinc-900 border border-zinc-700 flex justify-around w-1/2 p-2 rounded shadow ml-1 break-all ">
                                    <center class="block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-zinc-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>
                
                                        <p class="text-sm font-medium text-zinc-400">2408</p>
                                    </center>
                
                                    <center class="block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-zinc-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                        </svg>
                
                                        <p class="text-sm font-medium text-zinc-400">$0</p>
                                    </center>
                
                                    <center class="block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-zinc-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                        </svg>
                
                                        <p class="text-sm font-medium text-zinc-400">$5000</p>
                                    </center>
									
									<center class="block">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-zinc-500">
										  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
										</svg>
                
                                        <p class="text-sm font-medium text-zinc-400">0/5</p>
                                    </center>
                                </div>
                            </div>
                                </div>

        <div class="md:w-3/12 mb-1 md:mb-0">
			<iframe class="w-full h-96 shadow mb-1" src="https://discordapp.com/widget?id=1073730363710521514&theme=dark" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

            <div class="shadow overflow-y-hidden overflow-x-auto rounded mb-1">
                <table class="min-w-full divide-y divide-zinc-700 text-zinc-400">
                    <thead class="bg-zinc-900">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Nimi
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Tunnid
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-zinc-900 divide-y divide-zinc-700">
                        
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">Germooo</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">797</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">VonConnor</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">734</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">SLANGERS</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">653</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">Paff</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">620</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">meeko</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">604</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">Aries-svab</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">600</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">Greedy</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">594</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">kedropatrull</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">576</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">Exsesy</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">558</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">Karl</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">539</td>
                                        </tr>
                                    
                                        <tr class="hover:bg-zinc-700 text-sky-600 font-medium">
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">~u~ ICE | 8746</td>
                                            <td class="text-sm px-6 py-4 whitespace-nowrap">0</td>
                                        </tr>
                                                        </tbody>
                </table>
            </div>
        </div>

		    </div>
</div>

<script src="js/script.js" type="text/javascript"></script>