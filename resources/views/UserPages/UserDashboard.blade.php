<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Evacuation Monitoring System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .184 86.047);--color-yellow-600:oklch(.681 .162 75.834);--color-yellow-700:oklch(.554 .135 66.442);--color-yellow-800:oklch(.476 .114 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.286 .066 53.813);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.967 .067 122.328);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.897 .196 126.665);--color-lime-400:oklch(.841 .238 128.85);--color-lime-500:oklch(.768 .233 130.85);--color-lime-600:oklch(.648 .2 131.684);--color-lime-700:oklch(.532 .157 131.589);--color-lime-800:oklch(.453 .124 130.933);--color-lime-900:oklch(.405 .101 131.063);--color-lime-950:oklch(.274 .072 132.109);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.871 .15 154.449);--color-green-400:oklch(.792 .209 151.711);--color-green-500:oklch(.723 .219 149.579);--color-green-600:oklch(.627 .194 149.214);--color-green-700:oklch(.527 .154 150.069);--color-green-800:oklch(.448 .119 151.328);--color-green-900:oklch(.393 .095 152.535);--color-green-950:oklch(.266 .065 152.934);--color-emerald-50:oklch(.979 .021 166.113);--color-emerald-100:oklch(.95 .052 163.051);--color-emerald-200:oklch(.905 .093 164.15);--color-emerald-300:oklch(.845 .143 164.978);--color-emerald-400:oklch(.765 .177 163.223);--color-emerald-500:oklch(.696 .17 162.48);--color-emerald-600:oklch(.596 .145 163.225);--color-emerald-700:oklch(.508 .118 165.612);--color-emerald-800:oklch(.432 .095 166.913);--color-emerald-900:oklch(.378 .077 168.94);--color-emerald-950:oklch(.262 .051 172.552);--color-teal-50:oklch(.984 .014 180.72);--color-teal-100:oklch(.953 .051 180.801);--color-teal-200:oklch(.91 .096 180.426);--color-teal-300:oklch(.855 .138 181.071);--color-teal-400:oklch(.777 .152 181.912);--color-teal-500:oklch(.704 .14 182.503);--color-teal-600:oklch(.6 .118 184.704);--color-teal-700:oklch(.511 .096 186.391);--color-teal-800:oklch(.437 .078 188.216);--color-teal-900:oklch(.386 .063 188.416);--color-teal-950:oklch(.277 .046 192.524);--color-cyan-50:oklch(.984 .019 200.873);--color-cyan-100:oklch(.956 .045 203.388);--color-cyan-200:oklch(.917 .08 205.041);--color-cyan-300:oklch(.865 .127 207.078);--color-cyan-400:oklch(.789 .154 211.53);--color-cyan-500:oklch(.715 .143 215.221);--color-cyan-600:oklch(.609 .126 221.723);--color-cyan-700:oklch(.52 .105 223.128);--color-cyan-800:oklch(.45 .085 224.283);--color-cyan-900:oklch(.398 .07 227.392);--color-cyan-950:oklch(.302 .056 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.951 .026 236.824);--color-sky-200:oklch(.901 .058 230.902);--color-sky-300:oklch(.828 .111 230.318);--color-sky-400:oklch(.746 .16 232.661);--color-sky-500:oklch(.685 .169 237.323);--color-sky-600:oklch(.588 .158 241.966);--color-sky-700:oklch(.5 .134 242.749);--color-sky-800:oklch(.443 .11 240.79);--color-sky-900:oklch(.391 .09 240.876);--color-sky-950:oklch(.293 .066 243.157);--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.93 .034 272.788);--color-indigo-200:oklch(.87 .065 274.039);--color-indigo-300:oklch(.785 .115 274.713);--color-indigo-400:oklch(.673 .182 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.511 .262 276.966);--color-indigo-700:oklch(.457 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .144 278.697);--color-indigo-950:oklch(.257 .09 281.288);--color-violet-50:oklch(.969 .016 293.756);--color-violet-100:oklch(.943 .029 294.588);--color-violet-200:oklch(.894 .057 293.283);--color-violet-300:oklch(.811 .111 293.571);--color-violet-400:oklch(.702 .183 293.541);--color-violet-500:oklch(.606 .25 292.717);--color-violet-600:oklch(.541 .281 293.009);--color-violet-700:oklch(.491 .27 292.581);--color-violet-800:oklch(.432 .232 292.759);--color-violet-900:oklch(.38 .189 293.745);--color-violet-950:oklch(.283 .141 291.089);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.946 .033 307.174);--color-purple-200:oklch(.902 .063 306.703);--color-purple-300:oklch(.827 .119 306.383);--color-purple-400:oklch(.714 .203 305.504);--color-purple-500:oklch(.627 .265 303.9);--color-purple-600:oklch(.558 .288 302.321);--color-purple-700:oklch(.496 .265 301.924);--color-purple-800:oklch(.438 .218 303.724);--color-purple-900:oklch(.381 .176 304.987);--color-purple-950:oklch(.291 .149 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .037 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.833 .145 321.434);--color-fuchsia-400:oklch(.74 .238 322.16);--color-fuchsia-500:oklch(.667 .295 322.15);--color-fuchsia-600:oklch(.591 .293 322.896);--color-fuchsia-700:oklch(.518 .253 323.949);--color-fuchsia-800:oklch(.452 .211 324.591);--color-fuchsia-900:oklch(.401 .17 325.612);--color-fuchsia-950:oklch(.293 .136 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.899 .061 343.231);--color-pink-300:oklch(.823 .12 346.018);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .241 354.308);--color-pink-600:oklch(.592 .249 .584);--color-pink-700:oklch(.525 .223 3.958);--color-pink-800:oklch(.459 .187 3.815);--color-pink-900:oklch(.408 .153 2.432);--color-pink-950:oklch(.284 .109 3.907);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .03 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.81 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.439);--color-rose-600:oklch(.586 .253 17.585);--color-rose-700:oklch(.514 .222 16.935);--color-rose-800:oklch(.455 .188 13.697);--color-rose-900:oklch(.41 .159 10.272);--color-rose-950:oklch(.271 .105 12.094);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.968 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .022 252.894);--color-slate-400:oklch(.704 .04 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.446 .043 257.281);--color-slate-700:oklch(.372 .044 257.287);--color-slate-800:oklch(.279 .041 260.031);--color-slate-900:oklch(.208 .042 265.755);--color-slate-950:oklch(.129 .042 264.695);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 .001 286.375);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-zinc-950:oklch(.141 .005 285.823);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.87 0 0);--color-neutral-400:oklch(.708 0 0);--color-neutral-500:oklch(.556 0 0);--color-neutral-600:oklch(.439 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-50:oklch(.985 .001 106.423);--color-stone-100:oklch(.97 .001 106.424);--color-stone-200:oklch(.923 .003 48.717);--color-stone-300:oklch(.869 .005 56.366);--color-stone-400:oklch(.709 .01 56.259);--color-stone-500:oklch(.553 .013 58.071);--color-stone-600:oklch(.444 .011 73.639);--color-stone-700:oklch(.374 .01 67.558);--color-stone-800:oklch(.268 .007 34.298);--color-stone-900:oklch(.216 .006 56.043);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a,0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16/9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-font-feature-settings:var(--font-sans--font-feature-settings);--default-font-variation-settings:var(--font-sans--font-variation-settings);--default-mono-font-family:var(--font-mono);--default-mono-font-feature-settings:var(--font-mono--font-feature-settings);--default-mono-font-variation-settings:var(--font-mono--font-variation-settings)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing)*0)}.-mt-\[4\.9rem\]{margin-top:-4.9rem}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing)*1)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.-ml-8{margin-left:calc(var(--spacing)*-8)}.flex{display:flex}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/376\]{aspect-ratio:335/376}.h-1{height:calc(var(--spacing)*1)}.h-1\.5{height:calc(var(--spacing)*1.5)}.h-2{height:calc(var(--spacing)*2)}.h-2\.5{height:calc(var(--spacing)*2.5)}.h-3{height:calc(var(--spacing)*3)}.h-3\.5{height:calc(var(--spacing)*3.5)}.h-14{height:calc(var(--spacing)*14)}.h-14\.5{height:calc(var(--spacing)*14.5)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing)*1)}.w-1\.5{width:calc(var(--spacing)*1.5)}.w-2{width:calc(var(--spacing)*2)}.w-2\.5{width:calc(var(--spacing)*2.5)}.w-3{width:calc(var(--spacing)*3)}.w-3\.5{width:calc(var(--spacing)*3.5)}.w-\[448px\]{width:448px}.w-full{width:100%}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing)*0);translate:var(--tw-translate-x)var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x)var(--tw-rotate-y)var(--tw-rotate-z)var(--tw-skew-x)var(--tw-skew-y)}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-3{gap:calc(var(--spacing)*3)}.gap-4{gap:calc(var(--spacing)*4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*1)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*1)*calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-1\.5{padding-block:calc(var(--spacing)*1.5)}.py-2{padding-block:calc(var(--spacing)*2)}.pb-12{padding-bottom:calc(var(--spacing)*12)}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-white{color:var(--color-white)}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.opacity-100{opacity:1}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008),0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.\!filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)!important}.filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-300{transition-delay:.3s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing)*0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing)*0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media (hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}}@media (width>=64rem){.lg\:-mt-\[6\.6rem\]{margin-top:-6.6rem}.lg\:mb-0{margin-bottom:calc(var(--spacing)*0)}.lg\:mb-6{margin-bottom:calc(var(--spacing)*6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing)*0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing)*8)}.lg\:p-20{padding:calc(var(--spacing)*20)}}@media (prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media (hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}}}@starting-style{.starting\:translate-y-4{--tw-translate-y:calc(var(--spacing)*4);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:translate-y-6{--tw-translate-y:calc(var(--spacing)*6);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:opacity-0{opacity:0}}}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false;initial-value:rotateX(0)}@property --tw-rotate-y{syntax:"*";inherits:false;initial-value:rotateY(0)}@property --tw-rotate-z{syntax:"*";inherits:false;initial-value:rotateZ(0)}@property --tw-skew-x{syntax:"*";inherits:false;initial-value:skewX(0)}@property --tw-skew-y{syntax:"*";inherits:false;initial-value:skewY(0)}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}
            </style>
        @endif
    </head>
    <body style="margin: 0; padding: 0; font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; background: #FDFDFC; color: #1b1b18; min-height: 100vh;">
        <header style="background: linear-gradient(135deg, #1b1b18 0%, #2d2d2a 100%); color: white; padding: 20px 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
              
                <nav style="display: flex; gap: 15px; align-items: center;">
                    <a href="{{ route('evacuations.create') }}" style="background: #ff4444; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500; transition: background 0.3s;">📤 Report Evacuation</a>
                    <a href="{{ route('evacuations.index') }}" style="background: #2d2d2a; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500; border: 1px solid #706f6c;">📋 View All</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline;">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="background: #666; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500; transition: background 0.3s; cursor: pointer; display: inline-block;">🚪 Logout</a>
                    </form>
                </nav>
            </div>
        </header>
        <main style="max-width: 1200px; margin: 0 auto; padding: 40px 20px; width: 100%;">
            <!-- Statistics Dashboard -->
            <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
                <div style="background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #ff4444; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                    <p style="margin: 0; font-size: 13px; color: #706f6c; text-transform: uppercase; letter-spacing: 0.5px;">Active Evacuations</p>
                    <p style="margin: 10px 0 0 0; font-size: 32px; font-weight: 600; color: #ff4444;">{{ $activeCount ?? 0 }}</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #ff9800; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                    <p style="margin: 0; font-size: 13px; color: #706f6c; text-transform: uppercase; letter-spacing: 0.5px;">High Priority</p>
                    <p style="margin: 10px 0 0 0; font-size: 32px; font-weight: 600; color: #ff9800;">{{ $highPriority ?? 0 }}</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #4caf50; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                    <p style="margin: 0; font-size: 13px; color: #706f6c; text-transform: uppercase; letter-spacing: 0.5px;">Total Requests</p>
                    <p style="margin: 10px 0 0 0; font-size: 32px; font-weight: 600; color: #4caf50;">{{ $totalCount ?? 0 }}</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #2196f3; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                    <p style="margin: 0; font-size: 13px; color: #706f6c; text-transform: uppercase; letter-spacing: 0.5px;">People Affected</p>
                    <p style="margin: 10px 0 0 0; font-size: 32px; font-weight: 600; color: #2196f3;">{{ $peopleAffected ?? 0 }}</p>
                </div>
            </section>

            <!-- Recent Evacuations List -->
            <section>
                <h2 style="margin: 0 0 20px 0; font-size: 24px; font-weight: 600; color: #1b1b18;">Recent Evacuation Requests</h2>
                
                @if(isset($evacuations) && count($evacuations) > 0)
                    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); overflow: hidden;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: #f5f5f5; border-bottom: 1px solid #e0e0e0;">
                                    <th style="padding: 15px; text-align: left; font-weight: 600; color: #706f6c; font-size: 12px; text-transform: uppercase;">Location</th>
                                    <th style="padding: 15px; text-align: left; font-weight: 600; color: #706f6c; font-size: 12px; text-transform: uppercase;">Urgency</th>
                                    <th style="padding: 15px; text-align: left; font-weight: 600; color: #706f6c; font-size: 12px; text-transform: uppercase;">People</th>
                                    <th style="padding: 15px; text-align: left; font-weight: 600; color: #706f6c; font-size: 12px; text-transform: uppercase;">Status</th>
                                    <th style="padding: 15px; text-align: left; font-weight: 600; color: #706f6c; font-size: 12px; text-transform: uppercase;">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($evacuations as $evacuation)
                                    <tr style="border-bottom: 1px solid #f0f0f0; transition: background 0.3s;">
                                        <td style="padding: 15px; color: #1b1b18;">
                                            <strong>{{ $evacuation->name }}</strong><br>
                                            <span style="font-size: 12px; color: #706f6c;">📍 {{ $evacuation->location }}</span>
                                        </td>
                                        <td style="padding: 15px;">
                                            @php
                                                $urgencyColors = [
                                                    'high' => ['bg' => '#ffebee', 'text' => '#c62828', 'label' => '🔴 HIGH'],
                                                    'medium' => ['bg' => '#fff3e0', 'text' => '#e65100', 'label' => '🟡 MEDIUM'],
                                                    'low' => ['bg' => '#e8f5e9', 'text' => '#2e7d32', 'label' => '🟢 LOW']
                                                ];
                                                $urgency = $urgencyColors[$evacuation->urgency] ?? $urgencyColors['low'];
                                            @endphp
                                            <span style="background: {{ $urgency['bg'] }}; color: {{ $urgency['text'] }}; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 500;">
                                                {{ $urgency['label'] }}
                                            </span>
                                        </td>
                                        <td style="padding: 15px; color: #1b1b18; font-weight: 500;">
                                            {{ $evacuation->people_count ?? '-' }} people
                                        </td>
                                        <td style="padding: 15px;">
                                            @php
                                                $statusIcons = [
                                                    'pending' => ['bg' => '#fff3e0', 'text' => '#f57c00', 'icon' => '⏳', 'label' => 'Pending'],
                                                    'in_progress' => ['bg' => '#e3f2fd', 'text' => '#1976d2', 'icon' => '🔄', 'label' => 'In Progress'],
                                                    'completed' => ['bg' => '#e8f5e9', 'text' => '#388e3c', 'icon' => '✅', 'label' => 'Completed'],
                                                    'rescued' => ['bg' => '#e8f5e9', 'text' => '#388e3c', 'icon' => '✅', 'label' => 'Rescued'],
                                                ];
                                                $status = $statusIcons[$evacuation->status] ?? $statusIcons['pending'];
                                            @endphp
                                            <span style="background: {{ $status['bg'] }}; color: {{ $status['text'] }}; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 500;">
                                                {{ $status['icon'] }} {{ $status['label'] }}
                                            </span>
                                        </td>
                                        <td style="padding: 15px; color: #706f6c; font-size: 12px;">
                                            {{ $evacuation->created_at->format('M d, H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="{{ route('evacuations.index') }}" style="display: inline-block; background: #1b1b18; color: white; padding: 12px 30px; border-radius: 4px; text-decoration: none; font-weight: 500; transition: background 0.3s;">
                            📋 View All Requests
                        </a>
                    </div>
                @else
                    <div style="background: white; padding: 40px; border-radius: 8px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <p style="margin: 0 0 20px 0; font-size: 16px; color: #706f6c;">No evacuation requests yet.</p>
                        <a href="{{ route('evacuations.create') }}" style="display: inline-block; background: #ff4444; color: white; padding: 12px 30px; border-radius: 4px; text-decoration: none; font-weight: 500;">
                            📤 Report First Evacuation
                        </a>
                    </div>
                @endif
            </section>
            <style>
                
                 * { box-sizing: border-box; }
            body { font-family: 'Instrument Sans', system-ui, sans-serif; line-height: 1.6; background: linear-gradient(to bottom, #fef2f2, #ffffff); color: #1f2937; margin: 0; padding: 0; }
            
            /* Header */
            header { border-bottom: 1px solid #e5e7eb; background: white; position: sticky; top: 0; z-index: 100; }
            nav { max-width: 72rem; margin: 0 auto; padding: 0.75rem 1.5rem; display: flex; align-items: center; justify-content: space-between; }
            .logo { display: flex; align-items: center; gap: 0.75rem; }
            .logo-text { font-size: 1.125rem; font-weight: bold; color: #111827; }
            .logo-subtext { font-size: 0.65rem; color: #dc2626; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; }
            
            /* Hero */
            .hero { max-width: 72rem; margin: 0 auto; padding: 4rem 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
            .hero-badge { display: inline-flex; align-items: center; gap: 0.5rem; background: #fef2f2; color: #dc2626; padding: 0.375rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; margin-bottom: 1.5rem; border: 1px solid #fecaca; }
            .hero-title { font-size: 3.25rem; font-weight: 800; color: #111827; margin: 0 0 1.25rem 0; line-height: 1.1; }
            .hero-title span { color: #dc2626; }
            .hero-description { font-size: 1.125rem; color: #4b5563; margin-bottom: 1.75rem; line-height: 1.7; }
            
            /* Buttons */
            .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.875rem 2rem; font-weight: 600; border-radius: 0.5rem; text-decoration: none; transition: all 0.3s; border: none; cursor: pointer; }
            .btn-primary { background-color: #dc2626; color: white; box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3); }
            .btn-primary:hover { background-color: #b91c1c; }
            .btn-outline { border: 2px solid #dc2626; color: #dc2626; }
            .btn-outline:hover { background: #fef2f2; }
            
                /* About */
            .about { background: #f9fafb; padding: 4rem 1.5rem; }
            .about-container { max-width: 72rem; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
            .about-title { font-size: 1.75rem; font-weight: bold; color: #111827; margin-bottom: 1.5rem; }
            .about-section-title { font-size: 1.125rem; font-weight: bold; color: #dc2626; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem; }
            .about-section p { color: #4b5563; line-height: 1.7; }
            .contact-card { background: white; border-radius: 1rem; padding: 2rem; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); }
            .contact-title { font-size: 1.25rem; font-weight: bold; color: #111827; margin-bottom: 1.5rem; }
            .contact-item { display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1rem; }
            .contact-icon { background: #fef2f2; padding: 0.75rem; border-radius: 0.5rem; }
            .contact-label { font-size: 0.75rem; color: #6b7280; font-weight: 600; text-transform: uppercase; }
            .contact-value { color: #1f2937; font-weight: 500; }
            .contact-value.emergency { color: #dc2626; font-weight: 700; }
                 /* Features */
            .features { max-width: 72rem; margin: 0 auto; padding: 5rem 1.5rem; }
            .features-header { text-align: center; margin-bottom: 3rem; }
            .features-title { font-size: 2.25rem; font-weight: bold; color: #111827; margin-bottom: 0.75rem; }
            .features-subtitle { font-size: 1.125rem; color: #4b5563; }
            .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
            .feature-card { background: white; border-radius: 0.75rem; padding: 1.75rem; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); border: 1px solid #f3f4f6; transition: all 0.3s; }
            .feature-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); }
            .feature-icon { width: 3.5rem; height: 3.5rem; background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; }
            .feature-icon svg { width: 1.75rem; height: 1.75rem; color: #dc2626; }
            .feature-title { font-size: 1.125rem; font-weight: bold; color: #111827; margin-bottom: 0.75rem; }
            .feature-description { color: #4b5563; font-size: 0.9rem; line-height: 1.6; }
            
                    /* Footer */
            footer { background: #1f2937; border-top: 1px solid #374151; }
            .footer-container { max-width: 72rem; margin: 0 auto; padding: 3rem 1.5rem; }
            .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 2rem; }
            .footer-logo { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; }
            .footer-logo-img { width: 40px; height: 40px; background: #dc2626; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
            .footer-logo-text { font-size: 1.125rem; font-weight: bold; color: white; }
            .footer-logo-subtext { font-size: 0.65rem; color: #dc2626; font-weight: 700; letter-spacing: 0.1em; display: block; }
            .footer-description { color: #9ca3af; font-size: 0.875rem; line-height: 1.7; margin-bottom: 1rem; }
            .social-links { display: flex; gap: 1rem; }
            .social-link { width: 2.5rem; height: 2.5rem; background: #374151; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #9ca3af; transition: all 0.3s; }
            .social-link:hover { background: #dc2626; color: white; }
            .footer-title { font-size: 1rem; font-weight: bold; color: white; margin-bottom: 1.25rem; }
            .footer-links { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; }
            .footer-link { color: #9ca3af; text-decoration: none; font-size: 0.875rem; transition: color 0.3s; }
            .footer-link:hover { color: white; }
            .footer-emergency { background: #374151; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1rem; }
            .footer-emergency-label { color: #fee2e2; font-size: 0.875rem; margin-bottom: 0.5rem; }
            .footer-emergency-number { color: white; font-size: 1.25rem; font-weight: bold; }
            .footer-bottom { border-top: 1px solid #374151; padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; }
            .footer-copyright { display: flex; align-items: center; gap: 1rem; }
            .footer-municipal { width: 32px; height: 32px; background: #374151; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
            .footer-copyright-text { color: #9ca3af; font-size: 0.875rem; }
            .footer-copyright-sub { color: #6b7280; font-size: 0.75rem; }
            .footer-legal { display: flex; gap: 1.5rem; }
            .footer-legal-link { color: #6b7280; font-size: 0.875rem; text-decoration: none; }
            
            @media (max-width: 768px) {
                .hero { grid-template-columns: 1fr; text-align: center; }
                .about-container { grid-template-columns: 1fr; }
                .features-grid { grid-template-columns: 1fr; }
                .footer-grid { grid-template-columns: 1fr; }
                .role-buttons { grid-template-columns: 1fr; }
                
            }
        </style>
            
            <!-- System Info -->
            <section style="margin-top: 40px; background: #f5f5f5; padding: 30px; border-radius: 8px;">
                <h3 style="margin: 0 0 15px 0; font-size: 18px; font-weight: 600; color: #1b1b18;">System Information</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; font-size: 13px;">
                    <div>
                        <p style="margin: 0; color: #706f6c; text-transform: uppercase;">Last Update</p>
                        <p style="margin: 5px 0 0 0; font-weight: 600; color: #1b1b18;">{{ now()->format('M d, Y H:i') }}</p>
                    </div>
                    <div>
                        <p style="margin: 0; color: #706f6c; text-transform: uppercase;">System Status</p>
                        <p style="margin: 5px 0 0 0; font-weight: 600; color: #4caf50;">✓ Operational</p>
                    </div>
                    <div>
                        <p style="margin: 0; color: #706f6c; text-transform: uppercase;">Response Team</p>
                        <p style="margin: 5px 0 0 0; font-weight: 600; color: #1b1b18;">On Standby</p>
                    </div>
                </div>
            </section>
        </main>
        
        <section class="hero">
                <div>
                    <div class="hero-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1rem; height: 1rem;">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        Municipal Disaster Risk Reduction & Management Office
                    </div>
                    <h1 class="hero-title">Rescue <span>Three</span> Five Ten</h1>
                    <p class="hero-description">The official evacuation monitoring and emergency response system of the Municipality of Camalaniugan. Real-time coordination for disaster risk reduction across all 20 barangays.</p>
                    
                   
                        <a href="#features" class="btn btn-outline">Learn More</a>
                    </div>
                </div>

               <!-- Right Column - Visual with Logo -->
                    <div style="position: relative;">
                        <!-- Main Visual Card -->
                        <div style="background: linear-gradient(135deg, #091236 0%, rgba(4, 12, 53, 0.67) 100%); border-radius: 1.5rem; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(220, 38, 38, 0.35); text-align: center; color: white; min-height: 28rem; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            
                            <!-- Large Logo Display -->
                            <div style="margin-bottom: 1.5rem;">
                                @if(file_exists(public_path('images/mdrrmo-logo.png')))
                                    <img src="{{ asset('images/mdrrmo-logo.png') }}" alt="MDRRMO Camalaniugan Logo" style="width: 100px; height: 100px; object-fit: contain; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));">
                                @elseif(file_exists(public_path('images/logo.png')))
                                    <img src="{{ asset('images/logo.png') }}" alt="MDRRMO Camalaniugan Logo" style="width: 100px; height: 100px; object-fit: contain; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));">
                                @else
                                    <!-- SVG Logo Display -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" style="width: 100px; height: 100px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));">
                                        <!-- Shield Background -->
                                        <defs>
                                            <linearGradient id="shieldGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.3" />
                                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Shield Shape -->
                                        <path d="M100 10L180 35v70c0 40-35 75-80 85-45-10-80-45-80-85V35L100 10z" fill="url(#shieldGrad)" stroke="white" stroke-width="3"/>
                                        <!-- Inner Shield -->
                                        <path d="M100 25L165 45v55c0 30-28 58-65 65-37-7-65-35-65-65V45L100 25z" fill="none" stroke="white" stroke-width="2"/>
                                        <!-- Cross -->
                                        <path d="M100 45v65M75 75h50" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                        <!-- Checkmark -->
                                        <path d="M88 75l8 8 16-16" stroke="#dc2626" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                    </svg>
                                @endif
                            </div>

                            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">Camalaniugan</h3>
                            <p style="color: #fee2e2; margin-bottom: 1.5rem; font-size: 0.95rem;">Ensuring safety through technology, preparedness, and community cooperation</p>
                            
                            <!-- Feature List -->
                            <div style="text-align: left; width: 100%; max-width: 280px;">
                                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; flex-shrink: 0;">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z">
                                                                            <path d="M10 11a2 2 0 100-4 2 2 0 000 4z" fill="white"/>
                                </svg>
                                <span style="font-size: 0.9rem;">Barangay-level GPS tracking</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; flex-shrink: 0;">
                                    <path fill-rule="evenodd" d="M5 7a5 5 0 1110 0A5 5 0 015 7zm3 0a3 3 0 11-6 0 3 3 0 016 0zM3 14a7 7 0 0114 0H3z" clip-rule="evenodd" fill="white"/>
                                </svg>
                                <span style="font-size: 0.9rem;">Evacuation Center Management</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; flex-shrink: 0;">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" fill="white"/>
                                </svg>
                                <span style="font-size: 0.9rem;">Instant Municipal Alerts</span>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div style="position: absolute; top: -1rem; right: -1rem; width: 3rem; height: 3rem; background: #fee2e2; border-radius: 50%; opacity: 0.5;"></div>
                        <div style="position: absolute; bottom: -2rem; left: -2rem; width: 5rem; height: 5rem; background: #fef2f2; border-radius: 50%; opacity: 0.5;"></div>
                    </div>
            </section>

            <!-- About Section -->
            <section class="about">
                <div class="about-container">
                    <div>
                        <h2 class="about-title">About MDRRMO Camalaniugan</h2>
                        <div style="margin-bottom: 1.5rem;">
                            <h3 class="about-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"/></svg>
                                Our Mission
                            </h3>
                            <p>To strengthen the disaster risk reduction and management capabilities of Camalaniugan through integrated planning, coordination, and technology-driven solutions that protect lives and property.</p>
                        </div>
                        <div>
                            <h3 class="about-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm-1-5a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                                Our Vision
                            </h3>
                            <p>A disaster-resilient Camalaniugan where communities are prepared, responsive, and capable of recovering swiftly from any emergency situation.</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <h3 class="contact-title">Contact Information</h3>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/></svg></div>
                            <div><p class="contact-label">Address</p><p class="contact-value">Municipal Hall, Camalaniugan, Cagayan</p></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg></div>
                            <div><p class="contact-label">Rescue Hotline</p><p class="contact-value">0967-526-0473</p></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/></svg></div>
                            <div><p class="contact-label">Emergency Operation Center</p><p class="contact-value">Open 24/7</p></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/></svg></div>
                            <div><p class="contact-label">Emergency Hotline</p><p class="contact-value emergency">911</p></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="features" id="features">
                <div class="features-header">
                    <h2 class="features-title">System Capabilities</h2>
                    <p class="features-subtitle">Advanced tools designed for effective municipal emergency management</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"/></svg></div>
                        <h3 class="feature-title">Emergency Broadcasting</h3>
                        <p class="feature-description">Send instant SMS and voice alerts to all personnel and residents during emergencies.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2a8 8 0 00-8 8c0 1.498.334 2.927.92 4.196L4.396 17.5a.75.75 0 00.224 1.065l2.91 1.74a.75.75 0 001.18-.66l2.54-6.333A8 8 0 0012 10a8 8 0 000 16z"/></svg></div>
                        <h3 class="feature-title">Real-Time Evacuation Tracking</h3>
                        <p class="feature-description">Monitor locations of response teams and track evacuees moving to designated safe zones.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM2.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0z"/></svg></div>
                        <h3 class="feature-title">Personnel Management</h3>
                        <p class="feature-description">Track responder assignments, accountability, and status during evacuation operations.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c.016-.012.033-.024.05-.034a19.839 19.839 0 002.896-3.025 20.013 20.013 0 00-2.896-3.025 16.97 16.97 0 01-1.144-.742l-.071-.041a.76.76 0 00-.723 0l-.028.015-.071.041c-.378.153-.74.33-1.084.53l-.181.11a20.923 20.923 0 01-1.425 1.024.75.75 0 00-.215.534.75.75 0 00.215.534l.181.11c.385.22.75.43 1.084.53l.071.041a.76.76 0 00.723 0l.028-.015.071-.041c.378-.153.74-.33 1.084-.53l.181-.11a20.923 20.923 0 011.425-1.024.75.75 0 00.215-.534.75.75 0 00-.215-.534l-.181-.11c-.385-.22-.75-.43-1.084-.53l-.071-.041a.76.76 0 00-.723 0l-.028.015-.071.041c-.378.153-.74.33-1.084.53l-.181.11a20.923 20.923 0 01-1.425 1.024.75.75 0 00-.215.534.75.75 0 00.215.534l.181.11c.385.22.75.43 1.084.53l.071.041a.76.76 0 00.723 0l.028-.015.071-.041c.378-.153.74-.33 1.084-.53l.181-.11a20.923 20.923 0 011.425-1.024.75.75 0 00.215-.534.75.75 0 00-.215-.534l-.181-.11c-.385-.22-.75-.43-1.084-.53l-.071-.041a.76.76 0 00-.723 0l-.028.015-.071.041z"/></svg></div>
                        <h3 class="feature-title">Evacuation Center Management</h3>
                        <p class="feature-description">Manage evacuation facilities, track capacity, and monitor resources at each center.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"/></svg></div>
                        <h3 class="feature-title">Incident Reporting</h3>
                        <p class="feature-description">Document and track all incidents, damages, and casualties with real-time reporting.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.25 6a3 3 0 013-3h13.5a3 3 0 013 3v12a3 3 0 01-3 3H5.25a3 3 0 01-3-3V6zm3.97.97a.75.75 0 011.06 0l2.25 2.25a.75.75 0 010 1.06l-2.25 2.25a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06zm4.28 4.28a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"/></svg></div>
                        <h3 class="feature-title">Analytics & Reports</h3>
                        <p class="feature-description">Generate comprehensive reports and analytics to improve disaster response strategies.</p>
                    </div>
                </div>
            </section>
        </main>

        

        <!-- Footer -->
        <footer>
            <div class="footer-container">
                <div class="footer-grid">
                    <div>
                        <div class="footer-logo">
                            <div class="footer-logo-img"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: white;"><path d="M50 5L95 25v50L5 75V25L50 5z" fill="none" stroke="white" stroke-width="3"/><path d="M50 25v50M25 50h50" stroke="white" stroke-width="3"/></svg></div>
                            <div><span class="footer-logo-text">MDRRMO</span><span class="footer-logo-subtext">CAMALANIUGAN</span></div>
                        </div>
                        <p class="footer-description">The Municipal Disaster Risk Reduction and Management Office of Camalaniugan is committed to protecting lives and property through proactive planning, coordination, and community engagement.</p>
                        <div class="social-links">
                            <a href="#" class="social-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg></a>
                            <a href="#" class="social-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg></a>
                            <a href="#" class="social-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.37c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63z"/></svg></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="footer-title">Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="#" class="footer-link">Home</a></li>
                            <li><a href="#features" class="footer-link">Features</a></li>
                            <li><a href="#" class="footer-link">About Us</a></li>
                            <li><a href="#" class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="footer-title">Resources</h4>
                        <ul class="footer-links">
                            <li><a href="#" class="footer-link">Emergency Guidelines</a></li>
                            <li><a href="#" class="footer-link">Evacuation Maps</a></li>
                            <li><a href="#" class="footer-link">Training Materials</a></li>
                            <li><a href="#" class="footer-link">Reports & Documents</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="footer-title">Emergency Hotline</h4>
                        <div class="footer-emergency">
                            <p class="footer-emergency-label">For emergencies, call:</p>
                            <p class="footer-emergency-number">911</p>
                        </div>
                        <p style="color: #9ca3af; font-size: 0.875rem; margin: 0;">MDRRMO Office:</p>
                        <p style="color: white; font-size: 0.875rem; margin: 0;">(078) 892-1234</p>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-copyright">
                        <div class="footer-municipal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px; color: #9ca3af;"><path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" /><path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74z"/></svg></div>
                        <div><p class="footer-copyright-text">&copy; 2025 MDRRMO Camalaniugan. All rights reserved.</p><p class="footer-copyright-sub">Municipal Government of Camalaniugan, Cagayan</p></div>
                    </div>
                    <div class="footer-legal">
                        <a href="#" class="footer-legal-link">Privacy Policy</a>
                        <a href="#" class="footer-legal-link">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
    </body>
</html>
