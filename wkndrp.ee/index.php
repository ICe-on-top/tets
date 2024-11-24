
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <title>WKND Roleplay</title>
    </head>
    <body>
        <div id="indeterminate"></div>
        
        <div class="h-screen flex overflow-hidden bg-zinc-800 border-b border-zinc-700" x-data="{ sidebarOpen: false, currentGame: 'gtav' }" @keydown.window.escape="sidebarOpen = false">
            <div x-show="sidebarOpen" class="md:hidden">
                <div class="fixed inset-0 flex z-40">
                    <div @click="sidebarOpen = false" x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0" style="display: none;">
                        <div class="absolute inset-0 bg-zinc-600 opacity-75"></div>
                    </div>

                    <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex-1 flex flex-col max-w-xs w-full bg-zinc-800 text-zinc-200 border-zinc-700 border-r" style="display: none;">
                        <div class="absolute top-0 right-0 -mr-12 pt-2">
                            <button x-show="sidebarOpen" @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded focus:outline-none" style="display: none;">
                                <span class="sr-only">Close sidebar</span>

                                <svg class="h-6 w-6 text-zinc-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                            <div class="ml-auto mr-auto mb-1">
                                <div class="flex-shrink-0 flex items-center justify-center mb-1">
                                    <img class="w-10 h-10" src="images/logo.png" alt="logo">
                                    <h4 class="text-white font-bold text-2xl ml-2">WKND Roleplay</h4>
                                </div>
                                    
                                <select x-on:change="currentGame = $event.target.value; if (currentGame === 'gtav') {sidebarOpen = false; setPage('home', '');} else if (currentGame === 'rdr2') {sidebarOpen = false; setPage('home_rdr2', '');}" class="text-xs w-full py-2 py-1 bg-zinc-900 text-zinc-300 border border-zinc-700 rounded shadow text-center">
                                    <option value="gtav" selected>GTA V</option>
                                    <option value="rdr2">RDR 2</option>
                                </select>
                            </div>

                            <nav class="mt-1 px-2 space-y-1 bg-zinc-800 border-zinc-700 border-t">
                                <p class="mt-1 text-zinc-300 uppercase text-xs font-semibold">Mängija valikud</p>
                                
                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('home', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Avaleht
                                </a>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('introduction', '');" class="hidden text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                    Sissejuhatus
                                </a>

                                <a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('home_rdr2', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Avaleht
                                </a>

                                <a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('introduction_rdr2', '');" class="hidden text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                    Sissejuhatus
                                </a>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('rules', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    Reeglid
                                </a>
								
								<a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('rules_rdr2', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    Reeglid
                                </a>

                                <a @click="sidebarOpen = false; setPage('whitelist', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    Rollimängutest
                                </a>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('donations', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                    Annetamine
                                </a>

                                <a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('donations_rdr2', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                    Annetamine
                                </a>

								<a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('addon_vehicles', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
									<svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
									</svg>
                                    Eritellimused
                                </a>
								
								<a x-show="currentGame === 'gtav'" onclick="window.location.href='/map'" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                    </svg>
                                    Kaart
                                </a>
								
                                								
								                            </nav>
                        </div>
						
						<p class="text-xs text-center">© 2024 WKNDRP. All Rights Reserved. We do not have affiliation with any real world brands.</p>
						
                        <div class="flex-shrink-0 flex bg-zinc-800 border-t border-zinc-700 p-4 relative">
                            <div class="flex items-center">
                                <img class=" rounded-full" src="https://avatars.steamstatic.com/02a55797c09014c973f556414f8417751af57d57_medium.jpg">
                                <div class="ml-3">
                                <p class="text-base font-medium text-white">~u~ ICE | 8746</p>
                                <p class="text-sm font-medium text-zinc-400 group-hover:text-zinc-300">steam:11000016dce0b05</p>
                                </div>
                            </div>
                            <a onclick="window.location.href='steamauth/logoff.php'" class="hover:animate-pulse m-auto mr-0 text-zinc-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-zinc-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-14"></div>
                </div>
            </div>
            <div class="hidden md:flex md:flex-shrink-0">
                <div class="flex flex-col w-64">
                    <div class="flex flex-col h-0 flex-1 bg-zinc-800 text-zinc-200 border-zinc-700 border-r">
                        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                            <div class="ml-auto mr-auto mb-1">
                                <div class="flex-shrink-0 flex items-center justify-center mb-1">
                                    <img class="w-10 h-10" src="images/logo.png" alt="logo">
                                    <h4 class="text-white font-bold text-2xl ml-2">WKND Roleplay</h4>
                                </div>
                                    
                                <select x-on:change="currentGame = $event.target.value; if (currentGame === 'gtav') {sidebarOpen = false; setPage('home', '');} else if (currentGame === 'rdr2') {sidebarOpen = false; setPage('home_rdr2', '');}" class="text-xs w-full py-2 py-1 bg-zinc-900 text-zinc-300 border border-zinc-700 rounded shadow text-center">
                                    <option value="gtav" selected>GTA V</option>
									<option value="rdr2">RDR 2</option>
                                </select>
                            </div>

                            <nav class="mt-1 flex-1 px-2 space-y-1 bg-zinc-800 border-zinc-700 border-t">
                                <p class="mt-1 text-zinc-300 uppercase text-xs font-semibold">Mängija valikud</p>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('home', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Avaleht
                                </a>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('introduction', '');" class="hidden text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                    Sissejuhatus
                                </a>

                                <a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('home_rdr2', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Avaleht
                                </a>

                                <a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('introduction_rdr2', '');" class="hidden text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                    Sissejuhatus
                                </a>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('rules', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    Reeglid
                                </a>
								
								<a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('rules_rdr2', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    Reeglid
                                </a>

                                <a @click="sidebarOpen = false; setPage('whitelist', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    Rollimängutest
                                </a>

                                <a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('donations', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                    Annetamine
                                </a>

                                <a x-show="currentGame === 'rdr2'" @click="sidebarOpen = false; setPage('donations_rdr2', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                    Annetamine
                                </a>
								
								<a x-show="currentGame === 'gtav'" @click="sidebarOpen = false; setPage('addon_vehicles', '');" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
									<svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
									</svg>
                                    Eritellimused
                                </a>
								
								<a x-show="currentGame === 'gtav'" onclick="window.location.href='/map'" class="text-zinc-300 hover:bg-zinc-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded text-white">
                                    <svg class="text-zinc-300 mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                    </svg>
                                    Kaart
                                </a>

                                								
								                            </nav>
                        </div>
						
						<p class="text-xs text-center">© 2024 WKNDRP. All Rights Reserved. We do not have affiliation with any real world brands.</p>
						
                        <div class="flex-shrink-0 flex bg-zinc-800 border-t border-zinc-700 p-4 relative">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full" src="https://avatars.steamstatic.com/02a55797c09014c973f556414f8417751af57d57_medium.jpg">
                                <div class="ml-2">
                                    <p class="text-sm font-medium text-white">~u~ ICE | 8746</p>
                                    <p class="text-xs font-medium text-zinc-300 group-hover:text-zinc-200">steam:11000016dce0b05</p>
                                </div>
                            </div>
                            <a onclick="window.location.href='steamauth/logoff.php'" class="hover:animate-pulse m-auto mr-0 text-zinc-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-zinc-200">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-0 flex-1 overflow-hidden">
                <div :class="{ 'md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 z-10': !sidebarOpen, 'md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 z-0' : sidebarOpen}">
                    <button @click.stop="sidebarOpen = true" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded text-zinc-500 hover:text-zinc-900">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <main id="content" class="flex-1 relative z-0 overflow-y-auto focus:outline-none py-6 bg-zinc-800 text-zinc-300"></main>
                <div id="notify_container" class="absolute bottom-5 right-5 overflow-x-hidden overflow-y-hidden"></div>
            </div>
        </div>

        <script src="js/alpine.min.js" type="text/javascript"></script>
        <script src="js/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                setPage('home', '');
            });
        </script>
    </body>
</html>