$(document).ready(function () {
    let selectedPlayer = undefined;

    setPage = function(page, params) {
        selectedPlayer = undefined;
        $('#indeterminate').show();

        $("#content").load('pages/' + page + '.php' + params, function(response, status, xhr) {
            $('#indeterminate').hide();

            if (status == 'error') {
                console.log(xhr.status + " " + xhr.statusText );

                $('#content').html(`
                    <div class="px-4">
                        <div id="items" class="text-center">
                            <h4 class="text-yellow-700 text-9xl font-light mb-2">404</h4>

                            <div class="flex mt-6">
                                <div class="flex ml-auto mr-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-yellow-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>

                                    <p class="text-2xl ml-1 font-light">Seda lehte ei leitud!<p>
                                </div>
                            </div>

                            <button onclick="setPage('home', '')" class="mt-1 w-full md:w-96 px-2 py-2 shadow bg-zinc-600 hover:bg-zinc-700 text-white rounded">Tagasi avalehele</button>
                        </div>
                    </div>
                `)
            }
        });
    };

    whitelistSubmit = function() {
        $('#indeterminate').show();
        $("#submit_whitelist").prop("disabled", true);
        var formData = $("#whitelist_form").serialize();

        $.ajax({
            url: "pages/whitelist.php",
            type: "post",
            data: formData,
            success: function(response) {
                response = JSON.parse(response);
                $('#indeterminate').hide();

                if (response.status === 'success') {
                    setPage('whitelist', '')
                } else {
                    setPage('whitelist', `?faults=${response.faults}`)
                }
            },
            error: function(xhr, status, error) {
                $('#indeterminate').hide(); console.log('error')
            }
        });
    }

    showNotification = function(type, message) {
        let $notification

        if (type == 'success') {
            $notification = $(`
                <div class="flex min-w-96 break-all items-center p-4 text-zinc-400 bg-zinc-900 border border-zinc-700 rounded shadow mb-1" role="alert">
                    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded shadow">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
    
                    <div class="ml-3 text-sm font-normal">${message}</div>
    
                    <button onclick="this.parentElement.remove();" type="button" class="ml-auto -mx-1.5 -my-1.5 text-zinc-400 hover:text-zinc-700 rounded focus:ring-2 focus:ring-zinc-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            `);
        } else if (type == 'info') {
            $notification = $(`
                <div class="flex min-w-96 break-all items-center p-4 text-zinc-400 bg-zinc-900 border border-zinc-700 rounded shadow mb-1" role="alert">
                    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-sky-500 bg-sky-100 rounded shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
                        <span class="sr-only">Info icon</span>
                    </div>
    
                    <div class="ml-3 text-sm font-normal">${message}</div>
    
                    <button onclick="this.parentElement.remove();" type="button" class="ml-auto -mx-1.5 -my-1.5 text-zinc-400 hover:text-zinc-700 rounded focus:ring-2 focus:ring-zinc-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#toast-warning" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            `);
        } else if (type == 'error') {
            $notification = $(`
                <div class="flex min-w-96 break-all items-center p-4 text-zinc-400 bg-zinc-900 border border-zinc-700 rounded shadow mb-1" role="alert">
                    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded shadow">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Error icon</span>
                    </div>
    
                    <div class="ml-3 text-sm font-normal">${message}</div>
    
                    <button onclick="this.parentElement.remove();" type="button" class="ml-auto -mx-1.5 -my-1.5 text-zinc-400 hover:text-zinc-700 rounded focus:ring-2 focus:ring-zinc-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            `);
        }

        $('#notify_container').append($notification);

        setTimeout(function () {
            $notification.fadeOut(300)
        }, 5000)
    }

	capitalizeFirstLetter = function(str) {
		return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
	}
	
    validateName = function(input) {
        var regex = /^[a-zA-Z ]+$/;
        return regex.test(input);
    }

    validateDate = function(input) {
		var dateCheck = new Date(input);

		if (dateCheck == "Invalid Date") {
			return false
		}

        return true 
    }
	
	isValidAge = function(input) {
		const birthDate = new Date(input);
		const currentDate = new Date();

		let age = currentDate.getFullYear() - birthDate.getFullYear();
		const monthDiff = currentDate.getMonth() - birthDate.getMonth();
		const dayDiff = currentDate.getDate() - birthDate.getDate();
	
		if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
			age--;
		}

		return age >= 18 && age <= 80;
	}

	
	isValidAgeRdr = function(input) {
        return (input >= 18 && input <= 80);
    }

	let cooldown = false;

    createCharacter = function() {
        if (!cooldown) {
            let firstname = $('#createFirstname').val(); let lastname = $('#createLastname').val();
            let dob = $('#createDob').val(); let sex = $('#createSex').val();
    
            if (firstname != '' && lastname != '' && validateDate(dob) && (sex == 'm' || sex == 'f')) {
				if (isValidAge(dob)) {
					if (validateName(firstname) && validateName(lastname)) {
						cooldown = true
						setTimeout(() => { setPage('home', '') }, 300);
		
						$.post('pages/home.php', { firstname: capitalizeFirstLetter(firstname), lastname: capitalizeFirstLetter(lastname), dob: dob, sex: sex }, function(response) {
							response = JSON.parse(response);
		
							showNotification(response.type, response.message)
							setTimeout(() => { cooldown = false }, 1500);
						});
					} else {
						showNotification('error', 'Teie valitud nimes on lubamatud tähed!')
					}	
				} else {
					showNotification('error', 'Karakteri vanus ei tohi olla vähem kui 18 ega rohkem kui 80!')
				}
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    }
	
	createCharacter2 = function() {
        if (!cooldown) {
            let firstname = $('#createFirstnameUus').val(); let lastname = $('#createLastnameUus').val();
            let dob = $('#createDobUus').val(); let sex = $('#createSexUus').val();
    
            if (firstname != '' && lastname != '' && validateDate(dob) && (sex == 'm' || sex == 'f')) {
				if (isValidAge(dob)){
					if (validateName(firstname) && validateName(lastname)) {
						cooldown = true
						setTimeout(() => { setPage('home2', '') }, 300);
		
						$.post('pages/home2.php', { firstname: capitalizeFirstLetter(firstname), lastname: capitalizeFirstLetter(lastname), dob: dob, sex: sex }, function(response) {
							response = JSON.parse(response);
		
							showNotification(response.type, response.message)
							setTimeout(() => { cooldown = false }, 1500);
						});
					} else {
						showNotification('error', 'Teie valitud nimes on lubamatud tähed!')
					}
				} else {
					showNotification('error', 'Karakteri vanus ei tohi olla vähem kui 18 ega rohkem kui 80!')
				}
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    }

    createCharacterRdr2 = function() {
		if (!cooldown) {
			let firstname = $('#createFirstnameRdr2').val(); let lastname = $('#createLastnameRdr2').val();
			let dob = $('#createDobRdr2').val(); let sex = $('#createSexRdr2').val();

			if (firstname != '' && lastname != '' && dob != '' && (sex == 'm' || sex == 'f')) {
				if (isValidAgeRdr(dob)) {
					if (validateName(firstname) && validateName(lastname)) {
						cooldown = true
						setTimeout(() => { setPage('home_rdr2', '') }, 300);

						$.post('pages/home_rdr2.php', { firstname: capitalizeFirstLetter(firstname), lastname: capitalizeFirstLetter(lastname), dob: dob, sex: sex }, function(response) {
							response = JSON.parse(response);

							showNotification(response.type, response.message)
							setTimeout(() => { cooldown = false }, 1500);
						});
					} else {
						showNotification('error', 'Teie valitud nimes on lubamatud tähed!')
					}
				} else {
					showNotification('error', 'Karakteri vanus ei tohi olla vähem kui 18 ega rohkem kui 80!')
				}
			} else {
				showNotification('error', 'Täida kõik väljad korralikult!')
			}
		}
    }

    buyNameChange = function() {
        if (!cooldown) {
            let firstname = $('#newFirstname').val(); let lastname = $('#newLastname').val();

            if (firstname != '' && lastname != '') {
                if (validateName(firstname) && validateName(lastname)) {
                    cooldown = true;
                    setTimeout(() => { setPage('donations', '') }, 300);
    
                    $.post('pages/donations.php', { type: 'nameChange', pid: $('#newNameCharacter').val(), firstname: capitalizeFirstLetter(firstname), lastname: capitalizeFirstLetter(lastname)}, function(response) {
                        response = JSON.parse(response);
    
                        showNotification(response.type, response.message)
                        setTimeout(() => { cooldown = false }, 1500);
                    });
                } else {
                    showNotification('error', 'Teie valitud nimes on lubamatud tähed!')
                }
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    } 

    buyNameChangeRdr2 = function() {
        if (!cooldown) {
            let firstname = $('#newFirstnameRdr2').val(); let lastname = $('#newLastnameRdr2').val();

            if (firstname != '' && lastname != '') {
                if (validateName(firstname) && validateName(lastname)) {
                    cooldown = true;
                    setTimeout(() => { setPage('donations_rdr2', '') }, 300);

                    $.post('pages/donations_rdr2.php', { type: 'nameChange', pid: $('#newNameCharacterRdr2').val(), firstname: capitalizeFirstLetter(firstname), lastname: capitalizeFirstLetter(lastname)}, function(response) {
                        response = JSON.parse(response);

                        showNotification(response.type, response.message)
                        setTimeout(() => { cooldown = false }, 1500);
                    });
                } else {
                    showNotification('error', 'Teie valitud nimes on lubamatud tähed!')
                }
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    } 

    buyDobChange = function() {
        if (!cooldown) {
            let dob = $('#newDob').val();

            if (validateDate(dob)) {
                if (isValidAge(dob)) {
                    cooldown = true;
                    setTimeout(() => { setPage('donations', '') }, 300);

                    $.post('pages/donations.php', { type: 'dobChange', pid: $('#newNameCharacter2').val(), dob: dob}, function(response) {
                        response = JSON.parse(response);

                        showNotification(response.type, response.message)
                        setTimeout(() => { cooldown = false }, 1500);
                    });
                } else {
                    showNotification('error', 'Karakteri vanus ei tohi olla vähem kui 18 ega rohkem kui 80!')
                }
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    } 

    buyWhitelist = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'whitelist' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyWhitelistRdr2 = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'whitelist' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        } 
    } 

    discordUnlink = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'discordUnlink' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    } 

    discordUnlinkRdr2 = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'discordUnlink' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    } 

    customSound = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'customSound', link: $('#soundLink').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    } 

    addonVehicle = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'addonVehicle', pid: $('#carPid').val(), link: $('#carLink').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        } 
    } 

    addonPed = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'addonPed', pid: $('#pedPid').val(), link: $('#pedLink').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        } 
    } 

    buyFactionSlot = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'factionSlot', pid: $('#factionSlotCharacter').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    } 
	
	buyFactionSlotRdr2 = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'factionSlot', pid: $('#factionSlotCharacterRdr2').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        } 
    } 

    buyCharacterSlot = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'characterSlot' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    } 

    buyCharacterSlotRdr2 = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'characterSlot' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        } 
    } 

    buyPlateChange = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'plateChange', plate: $('#selectedPlateVehicle').val(), newPlate: $('#newPlate').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyCarRadio = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'carRadio', plate: $('#selectedRadioVehicle').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyUnban = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'unban' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyUnbanRdr2 = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'unban' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }
	
	additionalCarSlot = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'additionalCar', pid: $('#additionalCarVehicle').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    additionalClotheSlot = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'additionalClothe', pid: $('#additionalClotheChar').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    additionalCarSlotRdr2 = function() {
        if (!cooldown) {
            cooldown = true;
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'additionalCar', pid: $('#additionalCarVehicleRdr2').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    loadProfile = function(event) {
        if (event.keyCode === 13) {
            $('#indeterminate').show();

            $.post('pages/profiles.php', { action: 'search', search: $('#profileSearch').val() }, function(response) {
                response = JSON.parse(response);

                if (response.type === 'success') {
                    selectedPlayer = response.data.id;

                    $('#profileId').text(response.data.id);
                    $('#profileName').text(response.data.name);
                    $('#profileIdentifier').text(response.data.identifier);
                    $('#profileLicense').text(response.data.license);
                    $('#profileLive').text(response.data.liveid);
                    $('#profileXbox').text(response.data.xblid);
                    $('#profileDiscord').text(response.data.discord);
                    $('#profileLastIp').text(response.data.playerip);
                    $('#profileHours').text(response.data.hours);
                    $('#profileOnline').text(response.data.last_online);

                    if (response.data.status === 'accepted') {
                        $('#profileTest').html('<p class="text-green-700 font-bold">JAH</p>');
                    } else {
                        $('#profileTest').html('<p class="text-red-400 font-bold">EI</p>');
                    }
                    
                    $('#profileBugs').text(response.data.bug_tries);
                    $('#profileTries').text(response.data.test_tries);
                    $('#profileQueue').text(response.data.queue);
                    $('#profilePoints').text(response.data.points);

                    $('#profileNotes').val(response.data.admin_notes);

                    showNotification('success', 'Profiil leitud!');
                } else {
                    showNotification('error', 'Sisestatud profiili ei leitud!');
                }

                $('#indeterminate').hide();
            });
        }
    }
	
	loadProfileRdr2 = function(event) {
        if (event.keyCode === 13) {
            $('#indeterminate').show();

            $.post('pages/profiles_rdr2.php', { action: 'search', search: $('#profileSearchRdr2').val() }, function(response) {
                response = JSON.parse(response);

                if (response.type === 'success') {
                    selectedPlayer = response.data.identifier;

                    $('#profileNameRdr2').text(response.data.name);
                    $('#profileIdentifierRdr2').text(response.data.identifier);
                    $('#profileLicenseRdr2').text(response.data.license);
                    $('#profileLiveRdr2').text(response.data.liveid);
                    $('#profileXboxRdr2').text(response.data.xblid);
                    $('#profileDiscordRdr2').text(response.data.discord);
                    $('#profileLastIpRdr2').text(response.data.playerip);
                    $('#profileHoursRdr2').text(response.data.hours);
                    $('#profileOnlineRdr2').text(response.data.last_online);

                    if (response.data.status === 'accepted') {
                        $('#profileTestRdr2').html('<p class="text-green-700 font-bold">JAH</p>');
                    } else {
                        $('#profileTestRdr2').html('<p class="text-red-400 font-bold">EI</p>');
                    }
                    
                    $('#profileTriesRdr2').text(response.data.test_tries);
                    $('#profilePointsRdr2').text(response.data.points);

                    $('#profileNotesRdr2').val(response.data.admin_notes);

                    showNotification('success', 'Profiil leitud!');
                } else {
                    showNotification('error', 'Sisestatud profiili ei leitud!');
                }

                $('#indeterminate').hide();
            });
        }
    }

    saveNotes = function() {
        $('#indeterminate').show();

        $.post('pages/profiles.php', { action: 'saveNotes', id: selectedPlayer, notes: $('#profileNotes').val() }, function(response) {
            response = JSON.parse(response);

            showNotification(response.type, response.message);
            $('#indeterminate').hide();
        });
    }
	
	saveNotesRdr2 = function() {
        $('#indeterminate').show();

        $.post('pages/profiles_rdr2.php', { action: 'saveNotes', id: selectedPlayer, notes: $('#profileNotesRdr2').val() }, function(response) {
            response = JSON.parse(response);

            showNotification(response.type, response.message);
            $('#indeterminate').hide();
        });
    }

    buySpecialTime = function(page, id) {
        if (!cooldown) {
            cooldown = true
            $('#indeterminate').show();

            $.post('pages/addon_vehicles.php', { page: page, renew: id }, function(response) {
                response = JSON.parse(response);
    
                showNotification(response.type, response.message);
                setPage('addon_vehicles', '')
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }
	
	buySpecialRedeem = function(page, id) {
        if (!cooldown) {
            cooldown = true
            $('#indeterminate').show();

            $.post('pages/addon_vehicles.php', { page: page, redeem: id }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message);
                setPage('addon_vehicles', '')
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue1 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'priorityQueue1' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue2 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'priorityQueue2' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue3 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'priorityQueue3' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue4 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'priorityQueue4' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    updateQueueLevel = function(id) {
        if (!cooldown) {
            cooldown = true
            $('#indeterminate').show();

            $.post('pages/donations.php', { type: 'updateQueueLevel', id: id }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message);
                setPage('donations', '')
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyVehicleSound = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'vehicleSound', plate: $('#selectedSoundVehicle').val(), newSound: $('#newSound').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }
	
	clearAccount = function(pid) {
        setTimeout(() => { setPage('money', '') }, 300);

        $.post('pages/money.php', { action: 'clearAccount', identifier: pid }, function(response) {
            response = JSON.parse(response);

            showNotification(response.type, response.message)
        });
    }
	
	clearAccountRdr2 = function(id) {
        setTimeout(() => { setPage('money_rdr2', '') }, 300);

        $.post('pages/money_rdr2.php', { action: 'clearAccount', identifier: id }, function(response) {
            response = JSON.parse(response);

            showNotification(response.type, response.message)
        });
    }

    convertCoinsRdr2 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'convertCoins', pid: $('#coinCharRdr2').val(), amount: $('#coinAmountRdr2').val() }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue1Rdr2 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'priorityQueue1' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue2Rdr2 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'priorityQueue2' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue3Rdr2 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'priorityQueue3' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    buyPriorityQueue4Rdr2 = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations_rdr2', '') }, 300);

            $.post('pages/donations_rdr2.php', { type: 'priorityQueue4' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    updateQueueLevelRdr2 = function(id) {
        if (!cooldown) {
            cooldown = true
            $('#indeterminate').show();

            $.post('pages/donations_rdr2.php', { type: 'updateQueueLevel', id: id }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message);
                setPage('donations_rdr2', '')
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }

    supportRank = function() {
        if (!cooldown) {
            cooldown = true
            setTimeout(() => { setPage('donations', '') }, 300);

            $.post('pages/donations.php', { type: 'supportRank' }, function(response) {
                response = JSON.parse(response);

                showNotification(response.type, response.message)
                setTimeout(() => { cooldown = false }, 1500);
            });
        }
    }
	
	doRedeem = function() {
        if (!cooldown) {
            let code = $('#tranIdRedeem').val();

            if (code != '') {
                cooldown = true;
                setTimeout(() => { setPage('donations', '') }, 300);

                $.post('pages/donations.php', { type: 'doRedeem', identificator: $('#tranIdRedeem').val()}, function(response) {
                    response = JSON.parse(response);

                    showNotification(response.type, response.message)
                    setTimeout(() => { cooldown = false }, 1500);
                });
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    }

    doRedeemRdr2 = function() {
        if (!cooldown) {
            let code = $('#tranIdRedeemRdr2').val();

            if (code != '') {
                cooldown = true;
                setTimeout(() => { setPage('donations_rdr2', '') }, 300);

                $.post('pages/donations_rdr2.php', { type: 'doRedeem', identificator: $('#tranIdRedeemRdr2').val()}, function(response) {
                    response = JSON.parse(response);

                    showNotification(response.type, response.message)
                    setTimeout(() => { cooldown = false }, 1500);
                });
            } else {
                showNotification('error', 'Täida kõik väljad korralikult!')
            }
        }
    } 	
});