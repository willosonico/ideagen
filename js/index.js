/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
 
 var share_url;
 var share_word;

function share_facebook() {
	console.log(share_url);
	window.open(
	  'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(share_url), 
	  'facebook-share-dialog', 
	  'width=626,height=436'); 
}

function share_twitter() {
	console.log(share_url);
	window.open(
	  'https://twitter.com/share?text=Idea improbabile per il 2015 : '+share_word+'&url='+encodeURIComponent(share_url), 
	  'twitter-share-dialog', 
	  'width=626,height=436'); 
}

var app = {
	generating : false,
	generating_cur : -1,
    slidetime : 150,
    doit : 0,

    width : 0,

    cur1 : 0,
    cur2 : 0,
    cur3 : 0,

    max1 : 0,
    max2 : 0,
    max3 : 0,

    initialize: function() {
        console.log("console log init");
        this.bindEvents();
    },
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
        $(document).on("pagebeforechange", function() {
            $('.row').hide();
        });
        $(document).on("pagechange", function() {
            $('.shareblock').hide();
            $("#responsive_headline").fitText(1, { minFontSize: '22px', maxFontSize: '100px' });
            $('.row').css('font-size', $('#responsive_headline').css('font-size'));
            $('.row').fadeIn();
        });
        $(window).load(function() {
			$('#word1_inner .word').click(function() { app.gen(1); });
			$('#word2_inner .word').click(function() { app.gen(2); });
			$('#word3_inner .word').click(function() { app.gen(3); });
			
            app.start();
        });
        window.onresize = function(){
            this.width = $(document).width();
            $('.row, #genera_button').hide();
            clearTimeout(this.doit);
            this.doit = setTimeout(app.start, 600);
        };
        $('#genera_button').click(function () {
            app.genera();
        })
    },
    onDeviceReady: function() {
        console.log("device ready, start making you custom calls!");
    },
    start: function() {
        if (typeof $.mobile.activePage != 'undefined') {
            var cur_page = $.mobile.activePage.attr('id');
        }

        this.width = $(document).width();

        $('.row').css('width', this.width+"px");
        $('.word').css('width', this.width+"px");

        this.max1 = $('#word1 > .row_inner > .word').length;
        this.max2 = $('#word2 > .row_inner > .word').length;
        this.max3 = $('#word3 > .row_inner > .word').length;

        $('#word1 > .row_inner').css('width', this.width*this.max1+'px');
        $('#word2 > .row_inner').css('width', this.width*this.max2+'px');
        $('#word3 > .row_inner').css('width', this.width*this.max3+'px');

        $('.row').show(function() {
            $('#genera_button').slideDown();
        });

        this.cur1 = 0;
        this.cur2 = 0;
        this.cur3 = 0;

        $('#word1_inner').css('left', '0px');
        $('#word2_inner').css('left', '0px');
        $('#word3_inner').css('left', '0px');
    },
	gen: function(int) {
		if ((!app.generating || int != app.generating_cur) && app.generating_cur != 0) {
			app.generating = true;
			app.generating_cur = int;
			
			$('.shareblock').fadeOut();
	
			this.width = $(document).width();
	
			$('.row').css('font-size', $('#responsive_headline').css('font-size'));
			
			var new1 = this.cur1;
			var new2 = this.cur2;
			var new3 = this.cur3;
			
			var new_cur;
			if (int == 1) {
				while (new1 == this.cur1) new1 = Math.round(Math.random()*(this.max1-1));
				new_cur = new1;
				app.cur1 = new_cur;
			}
			if (int == 2) {
				while (new2 == this.cur2) new2 = Math.round(Math.random()*(this.max2-1));
				new_cur = new2;
				app.cur2 = new_cur;
			}
			if (int == 3) {
				while (new3 == this.cur3) new3 = Math.round(Math.random()*(this.max3-1));
				new_cur = new3;
				app.cur3 = new_cur;
			}
			
			console.log(new_cur);
			
			$('#word'+int+'_inner')
			.stop(true, true).animate(
				{
					left:'-'+new_cur*this.width+'px'
				},
				{
					duration : 5000,
					easing: 'easeInOutElastic',
					complete :
					function() {
						app.generating = false;
						app.generating_cur = -1;
						$('.shareblock').fadeIn();
						
						var word1 = $('#word1_inner').children().eq(app.cur1).html().trim().replace(' ', '_');
						var word2 = $('#word2_inner').children().eq(app.cur2).html().trim().replace(' ', '_');
						var word3 = $('#word3_inner').children().eq(app.cur3).html().trim().replace(' ', '_');
				
						share_word = word1+" "+word2+" "+word3;
						share_word = share_word.replace('_', ' ');
						
						var post_url = word1+"/"+word2+"/"+word3+"/";
						var base_url = "http://www.callistogames.com/ideagen/";
						share_url = base_url+post_url;
					}
				}
			);
			
			
		}
	},
    genera: function() {
		console.log(app.generating);
		if (!app.generating) {
			app.generating = true;
			app.generating_cur = 0;
			$('.shareblock').fadeOut();
	
			this.width = $(document).width();
	
			$('.row').css('font-size', $('#responsive_headline').css('font-size'));
	
			var new1 = this.cur1;
			var new2 = this.cur2;
			var new3 = this.cur3;
	
			while (new1 == this.cur1) new1 = Math.round(Math.random()*(this.max1-1));
			while (new2 == this.cur2) new2 = Math.round(Math.random()*(this.max2-1));
			while (new3 == this.cur3) new3 = Math.round(Math.random()*(this.max3-1));
	
			this.cur1 = new1;
			this.cur2 = new2;
			this.cur3 = new3;
	
			$('#word1_inner')
			.stop(true, true)
			.animate(
				{
					left:'-'+this.cur1*this.width+'px'
				},
				{
					duration : 5000,
					easing: 'easeInOutElastic'
				}
			);
			$('#word2_inner')
			.stop(true, true)
			.animate(
				{
					left:'-'+this.cur2*this.width+'px'
				},
				{
					duration : 5000,
					easing: 'easeInOutElastic'
				}
			);
			$('#word3_inner')
			.stop(true, true)
			.animate(
				{
					left:'-'+this.cur3*this.width+'px'
				},
				{
					duration : 5000,
					easing: 'easeInOutElastic',
					complete :
					function() {
						app.generating = false;
						app.generating_cur = -1;
						$('.shareblock').fadeIn();
						
						var word1 = $('#word1_inner').children().eq(app.cur1).html().trim().replace(' ', '_');
						var word2 = $('#word2_inner').children().eq(app.cur2).html().trim().replace(' ', '_');
						var word3 = $('#word3_inner').children().eq(app.cur3).html().trim().replace(' ', '_');
				
						share_word = word1+" "+word2+" "+word3;
						share_word = share_word.replace('_', ' ');
						
						var post_url = word1+"/"+word2+"/"+word3+"/";
						var base_url = "http://www.callistogames.com/ideagen/";
						share_url = base_url+post_url;
					}
				}
			);
		}
    }
};

app.initialize();