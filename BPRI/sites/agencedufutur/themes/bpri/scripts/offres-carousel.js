//////////////////////////////////////////////////////////////////////////////////
// CloudCarousel V1.0.5
// (c) 2011 by R Cecco. <http://www.professorcloud.com>
// MIT License
//
// Please retain this copyright header in all versions of the software
//////////////////////////////////////////////////////////////////////////////////

(function($) {

	
	// START Item object.
	// A wrapper object for items within the carousel.
	var	Item = function(imgIn, options)
	{								
		if(imgIn.nodeName !== "IMG") {
			// assume a wrapper div
			this.wrapper = imgIn;
		       	this.image = $("img", imgIn)[0]; // use the first image found in the markup for the reflection image if required - must contain at least one
		        this.orgWidth = this.wrapper.offsetWidth;
		        this.orgHeight = this.wrapper.offsetHeight;
				
				//Emeline's add
				this.orgFontSize = parseInt(getComputedStyle(this.wrapper, null).getPropertyValue("font-size"),10);
				this.images = $("img", imgIn);
				this.imagesOrgSize = [];
				for (var i=0; i<this.images.length; i++)
				{
					this.imagesOrgSize[i] = [this.images[i].width, this.images[i].height];
				}
				this.videos = $("video", imgIn);
				this.videosOrgSize = [];
				for (var i=0; i<this.videos.length; i++)
				{
					this.videosOrgSize[i] = [this.videos[i].width, this.videos[i].height];
				}
				this.upScrollButton = $(".up-arrow", imgIn)[0];
				this.upScrollButtonSize = [this.upScrollButton.offsetWidth, this.upScrollButton.offsetHeight];
				this.downScrollButton = $(".down-arrow", imgIn)[0];
				this.downScrollButtonSize = [this.downScrollButton.offsetWidth, this.downScrollButton.offsetHeight];

				this.contentDiv = $(".details-offre", imgIn)[0];
				this.contentDivOrgHeight = parseInt(getComputedStyle(this.contentDiv, null).getPropertyValue("height"),10);
					//Left right top bottom
				this.orgMargins = [parseInt(getComputedStyle(this.contentDiv, null).getPropertyValue("left"),10), 
									parseInt(getComputedStyle(this.contentDiv, null).getPropertyValue("right"),10),
									parseInt(getComputedStyle(this.contentDiv, null).getPropertyValue("top"),10),
									parseInt(getComputedStyle(this.contentDiv, null).getPropertyValue("bottom"),10)];
									
				this.allH1Titles = $("h1", this.contentDiv);
				this.H1TitlesOrgFontSize;
				if (this.allH1Titles.length)
				this.H1TitlesOrgFontSize = parseInt(getComputedStyle(this.allH1Titles[0], null).getPropertyValue("font-size"),10);
				
				this.allH2Titles = $("h2", this.contentDiv);
				this.H2TitlesOrgFontSize;
				if (this.allH2Titles.length)
				this.H2TitlesOrgFontSize = parseInt(getComputedStyle(this.allH2Titles[0], null).getPropertyValue("font-size"),10);
				
				this.allH3Titles = $("h3", this.contentDiv);
				this.H3TitlesOrgFontSize;
				if (this.allH3Titles.length)
				this.H3TitlesOrgFontSize = parseInt(getComputedStyle(this.allH3Titles[0], null).getPropertyValue("font-size"),10);

				this.badges = $(".badges", imgIn)[0];
				this.badgesOrgTop = parseInt(getComputedStyle(this.badges, null).getPropertyValue("top"),10);
				this.badgesOrgRight = parseInt(getComputedStyle(this.badges, null).getPropertyValue("right"),10);
				
				this.partieDroite = $(".partie-droite", imgIn)[0];
				this.partieDroiteOrgSize = [this.partieDroite.offsetWidth, this.partieDroite.offsetHeight];
				
				//this.
				
				//End Emeline's add
		} else {
			// just an image
			this.wrapper = null;
		        this.image = imgIn;
		        this.orgWidth = this.image.width;
		        this.orgHeight = this.image.height;
				this.alt = this.image.alt;
				this.title = this.image.title;
		}				
				
		this.options = options;				
						
		this.imageOK = true;	

		//$(this.image).css('position','absolute');
	};// END Item object
	
	
	// Controller object.
	// This handles moving all the items, dealing with mouse clicks etc.	
	var Controller = function(container, images, options)
	{						
		var	items = [], funcSin = Math.sin, funcCos = Math.cos, ctx=this;
		this.controlTimer = 0;
		this.stopped = false;
		//this.imagesLoaded = 0;
		this.container = container;
		this.xRadius = options.xRadius;
		this.yRadius = options.yRadius;
		this.showFrontTextTimer = 0;
		this.autoRotateTimer = 0;
		if (options.xRadius === 0)
		{
			this.xRadius = ($(container).width()/2.3);
		}
		if (options.yRadius === 0)
		{
			this.yRadius = ($(container).height()/6);
		}

		this.xCentre = options.xPos;
		this.yCentre = options.yPos;
		this.frontIndex = 0;	// Index of the item at the front
		
		// Start with the first item at the front.
		this.rotation = this.destRotation = Math.PI/2;
		this.timeDelay = 1000/options.FPS;
								
		// Turn on the infoBox
		if(options.altBox !== null)
		{
			$(options.altBox).css('display','block');	
			$(options.titleBox).css('display','block');	
		}
		// Turn on relative position for container to allow absolutely positioned elements
		// within it to work.
		$(container).css({ position:'relative', overflow:'hidden'} );
	
		$(options.buttonLeft).css('display','inline');
		$(options.buttonRight).css('display','inline');
		
		//albanx add
        var touchy=("ontouchstart" in document.documentElement)?true:false;
		var move='touchmove';
		var end='touchend mouseup';
		var down='touchstart mousedown';
		
		// Setup the buttons.
		$(options.buttonLeft).bind(end,this,function(event){
			event.data.rotate(-1);
			return false;
		});
		$(options.buttonRight).bind(end,this,function(event){															
			event.data.rotate(1);
			return false;
		});
		
		// You will need this plugin for the mousewheel to work: http://plugins.jquery.com/project/mousewheel
		if (options.mouseWheel)
		{
			$(container).bind('mousewheel',this,function(event, delta) {					 
					 event.data.rotate(delta);
					 return false;
				 });
		}
		
		//albanx add
		var START_X=0;
		if(touchy)
		{
			$(container).bind(move,this,function(event) {	
				var mx=event.originalEvent.touches[0].pageX;
				var sensivity=$(container).width()/items.length;
				if(Math.abs(mx-START_X)>=sensivity)
				{
					var sign = (mx-START_X < 0) ? 1 : -1;//calculate if to go fw or bw
					event.data.rotate(sign);
					START_X=mx;
				}
				 return false;
			 });
		}
		
		$(container).bind('mouseover click touchstart',this,function(event){
			//albanx add
			if(touchy)
			{
				START_X=event.originalEvent.touches[0].pageX;
			}
			
			clearInterval(event.data.autoRotateTimer);		// Stop auto rotation if mouse over.
			var	text = $(event.target).attr('alt');		
			// If we have moved over a carousel item, then show the alt and title text.
		
			if ( text !== undefined && text !== null )
			{
					
				clearTimeout(event.data.showFrontTextTimer);			
				$(options.altBox).html( ($(event.target).attr('alt') ));
				$(options.titleBox).html( ($(event.target).attr('title') ));							
				if ( options.bringToFront && (event.type == 'click' || event.type == 'touchstart') )//albanx add				
				{
					var	idx = $(event.target).data('itemIndex');	
					var	frontIndex = event.data.frontIndex;
					//var	diff = idx - frontIndex;                    
                    var        diff = (idx - frontIndex) % images.length;
                    if (Math.abs(diff) > images.length / 2) {
                        diff += (diff > 0 ? -images.length : images.length);
                    }
                    
					event.data.rotate(-diff);
				}
			}
		});
		// If we have moved out of a carousel item (or the container itself),
		// restore the text of the front item in 1 second.
		$(container).bind('mouseout touchend',this,function(event){
				var	context = event.data;				
				clearTimeout(context.showFrontTextTimer);				
				context.showFrontTextTimer = setTimeout( function(){context.showFrontText();},1000);
				context.autoRotate();	// Start auto rotation.
		});

		// Prevent items from being selected as mouse is moved and clicked in the container.
		$(container).bind(down,this,function(event){	
			
			event.data.container.focus();
			return false;
		});
		container.onselectstart = function () { return false; };		// For IE.

		this.innerWrapper = $(container).wrapInner('<div style="position:absolute;width:100%;height:100%;"/>').children()[0];
	
		// Shows the text from the front most item.
		this.showFrontText = function()
		{	
			if ( items[this.frontIndex] === undefined ) { return; }	// Images might not have loaded yet.
			$(options.titleBox).html( $(items[this.frontIndex].image).attr('title'));
			$(options.altBox).html( $(items[this.frontIndex].image).attr('alt'));				
		};
						
		this.go = function()
		{				
			if(this.controlTimer !== 0) { return; }
			var	context = this;
			this.controlTimer = setTimeout( function(){context.updateAll();},this.timeDelay);					
		};
		
		this.stop = function()
		{
			clearTimeout(this.controlTimer);
			this.controlTimer = 0;				
		};
		
		
		// Starts the rotation of the carousel. Direction is the number (+-) of carousel items to rotate by.
		this.rotate = function(direction)
		{	
			this.frontIndex -= direction;
			this.frontIndex %= items.length;
			this.destRotation += ( Math.PI / items.length ) * ( 2*direction );
			this.showFrontText();
			this.go();			
			//Emeline's add
			/*Change opacity of offers that go to the background*/
			var currentIndex;
			if (this.frontIndex < 0) 
			currentIndex = this.frontIndex + items.length; 
			else 
			currentIndex = this.frontIndex;
			
			for (var i = 0; i < items.length; i ++) {
				if (i === currentIndex) {
					items[i].wrapper.style.opacity = 1;
				}
				else {
					items[i].wrapper.style.opacity = 0.6;
				}
			}
			//End Emeline's add
		};
		
		
		this.autoRotate = function()
		{			
			if ( options.autoRotate !== 'no' )
			{
				var	dir = (options.autoRotate === 'right')? 1 : -1;
				this.autoRotateTimer = setInterval( function(){ctx.rotate(dir); }, options.autoRotateDelay );
			}
		};
		
		// This is the main loop function that moves everything.
		this.updateAll = function()
		{											
			var	minScale = options.minScale;	// This is the smallest scale applied to the furthest item.
			var smallRange = (1-minScale) * 0.5;
			var	w,h,x,y,scale,item,sinVal;
			
			var	change = (this.destRotation - this.rotation);				
			var	absChange = Math.abs(change);
	
			this.rotation += change * options.speed;
			if ( absChange < 0.001 ) { this.rotation = this.destRotation; }			
			var	itemsLen = items.length;
			var	spacing = (Math.PI / itemsLen) * 2; 
			//var	wrapStyle = null;
			var	radians = this.rotation;
			var	isMSIE = $.browser.msie;
		
			// Turn off display. This can reduce repaints/reflows when making style and position changes in the loop.
			// See http://dev.opera.com/articles/view/efficient-javascript/?page=3			
			this.innerWrapper.style.display = 'none';		
			
			var	style;
			var	px = 'px';	
			var context = this;
			for (var i = 0; i<itemsLen ;i++)
			{
				item = items[i];
								
				sinVal = funcSin(radians);
				
				scale = ((sinVal+1) * smallRange) + minScale;
				
				x = this.xCentre + (( (funcCos(radians) * this.xRadius) - (item.orgWidth*0.5)) * scale);
				y = this.yCentre + (( (sinVal * this.yRadius)  ) * scale);		
		
				if (item.imageOK)
				{
					if(item.wrapper !== null) {
						// just move/size the wrapper div
						// contents will go with it and need their own css to scale e.g. % widths
					        w = item.orgWidth * scale;					
					        h = item.orgHeight * scale;
					        $(item.wrapper).width(w);
							$(item.wrapper).height(h);
							//Emeline's add
							$(item.contentDiv).height(item.contentDivOrgHeight * scale);
							for (var j =0; j <item.images.length; j++) {
								$(item.images[j]).width(item.imagesOrgSize[j][0] * scale);
								$(item.images[j]).height(item.imagesOrgSize[j][1] * scale);
							}
							for (var j =0; j <item.videos.length; j++) {
								if (item.videosOrgSize[j][0] != 0) {
									$(item.videos[j]).width(item.videosOrgSize[j][0] * scale);
								}
								if (item.videosOrgSize[j][1] !=0) {
									$(item.videos[j]).height(item.videosOrgSize[j][1] * scale);
								}
							}
							item.contentDiv.style.left = "" + item.orgMargins[0] * scale + "px";
							item.contentDiv.style.right = "" + item.orgMargins[1] * scale + "px";
							item.contentDiv.style.top = "" + item.orgMargins[2] * scale + "px";
							item.contentDiv.style.bottom = "" + item.orgMargins[3] * scale + "px";
							item.wrapper.style.fontSize = "" + item.orgFontSize * scale + "px";
							$(item.upScrollButton).width(item.upScrollButtonSize[0] * scale);
							$(item.upScrollButton).height(item.upScrollButtonSize[1] * scale);
							$(item.downScrollButton).width(item.downScrollButtonSize[0] * scale);
							$(item.downScrollButton).height(item.downScrollButtonSize[1] * scale);
							if(item.H1TitlesOrgFontSize !== undefined) {
								for (var j=0; j <item.allH1Titles.length; j++){
									item.allH1Titles[j].style.fontSize = "" + item.H1TitlesOrgFontSize * scale + "px";
								}
							}
							if(item.H2TitlesOrgFontSize !== undefined) {
								for (var j=0; j <item.allH2Titles.length; j++){
									item.allH2Titles[j].style.fontSize = "" + item.H2TitlesOrgFontSize * scale + "px";
								}
							}
							if(item.H3TitlesOrgFontSize !== undefined) {
								for (var j=0; j <item.allH3Titles.length; j++){
									item.allH3Titles[j].style.fontSize = "" + item.H3TitlesOrgFontSize * scale + "px";
								}
							}
							item.badges.style.top = "" + item.badgesOrgTop * scale + "px";
							item.badges.style.right = "" + item.badgesOrgRight * scale + "px";
							
							$(item.partieDroite).width(item.partieDroiteOrgSize[0] * scale);
							$(item.partieDroite).height(item.partieDroiteOrgSize[1] * scale);
							
					        item.wrapper.style.left = x + px ;
					        item.wrapper.style.top = y + px;
					        item.wrapper.style.zIndex = "" + (scale * 100)>>0;	// >>0 = Math.foor(). Firefox doesn't like fractional decimals in z-index.
					} else {
					        img = item.image;
					        w = img.width = item.orgWidth * scale;					
					        h = img.height = item.orgHeight * scale;
					        img.style.left = x + px ;
					        img.style.top = y + px;
					        img.style.zIndex = "" + (scale * 100)>>0;	// >>0 = Math.foor(). Firefox doesn't like fractional decimals in z-index.
					}					
				}
				radians += spacing;
			}
			// Turn display back on.					
			this.innerWrapper.style.display = 'block';

			// If we have a preceptable change in rotation then loop again next frame.
			if ( absChange >= 0.001 )
			{				
				this.controlTimer = setTimeout( function(){context.updateAll();},this.timeDelay);		
			}else
			{
				// Otherwise just stop completely.				
				this.stop();
			}
		}; // END updateAll		
		
		// Create an Item object for each image	
//		func = function(){return;ctx.updateAll();} ;

		// Check if images have loaded. We need valid widths and heights for the reflections.
		this.checkImagesLoaded = function()
		{
			var	i,realImg;
			for(i=0;i<images.length;i++) {
				if ( (images[i].width === undefined) || ( (images[i].complete !== undefined) && (!images[i].complete)  ))
				{
					if(images[i].nodeName === "IMG") {
					        return;					
					} else {
						// wrapper div case - find first image in markup to check
						realImg = $("img", images[i])[0];
						//Emeline's add
						if(realImg !== undefined)
						
				                if ( (realImg.width === undefined) || ( (realImg.complete !== undefined) && (!realImg.complete)  )) {
							return;
						}
			                }
				}				
			}
			for(i=0;i<images.length;i++) {				
				 items.push( new Item( images[i], options ) );	
				 $(images[i]).data('itemIndex',i);
			}
			// If all images have valid widths and heights, we can stop checking.			
			clearInterval(this.tt);
			this.showFrontText();
			this.autoRotate();	
			this.updateAll();
			
		};

		this.tt = setInterval( function(){ctx.checkImagesLoaded();},50);	
	}; // END Controller object
	
	// The jQuery plugin part. Iterates through items specified in selector and inits a Controller class for each one.
	$.fn.CloudCarousel = function(options) {
			
		this.each( function() {			
			
			options = $.extend({}, {
							   minScale:0.5,
							   xPos:0,
							   yPos:0,
							   xRadius:0,
							   yRadius:0,
							   altBox:null,
							   titleBox:null,
							   FPS: 30,
							   autoRotate: 'no',
							   autoRotateDelay: 1500,
							   speed:0.2,
							   mouseWheel: false,
								 bringToFront: false
			},options );									
			// Create a Controller for each carousel.		
			$(this).data('cloudcarousel', new Controller( this, $('.cloudcarousel',$(this)), options) );
		});				
		return this;
	};
	
	$.fn.Rotate = function(direction) {
		$(this).data('cloudcarousel').rotate(direction);
	}
		

})(jQuery);