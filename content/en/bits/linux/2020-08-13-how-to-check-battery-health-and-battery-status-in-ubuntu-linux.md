---
title: "How to Check Battery Health and Battery Status in Ubuntu Linux"
date: 2020-08-13T13:18:58+06:00
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: false
enableSeries: true
enableSeriesContent: true
series:
- test

tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
bit_tags:
- linux
- ubuntu
- battery
bit_series:
bit_categories:
- linux
image:
---


## using `upower` command
upower command will give lot more information about battery, like battery health, battery vendor, battery model. 

battery model will help you to buy battery in case battery replacement 

~~~bash
upower -i /org/freedesktop/UPower/devices/battery_BAT0
~~~

here `battery_BAT0` refer to first battery of your laptop

if you using a laptop with extra battery like thinkpad t460s, t470s, You need to change battery index number to  `battery_BAT1`. So command will be following 

~~~bash
upower -i /org/freedesktop/UPower/devices/battery_BAT1
~~~

In my case I am getting following output in my terminal

~~~bash
  native-path:          BAT1
  vendor:               SANYO 11
  model:                00HW024
  serial:               44224
  power supply:         yes
  updated:              Thu 13 Aug 2020 13:34:12 +06 (39 seconds ago)
  has history:          yes
  has statistics:       yes
  battery
    present:             yes
    rechargeable:        yes
    state:               charging
    warning-level:       none
    energy:              23.12 Wh
    energy-empty:        0 Wh
    energy-full:         24.42 Wh
    energy-full-design:  24.42 Wh
    energy-rate:         9.679 W
    voltage:             12.94 V
    time to full:        8.1 minutes
    percentage:          94%
    capacity:            100%
    technology:          lithium-ion
    icon-name:          'battery-full-charging-symbolic'
  History (charge):
    1597304052  94.000  charging
  History (rate):
    1597304052  9.679 charging
~~~

## using acpi command 

I found, I need only `upower` command to know more about my battery health and status

First install `acpi-tool`  

~~~bash
snap install acpi-tools
~~~

~~~bash
sudo apt install acpi
~~~

just `acpi` command will show battery status

I am getting following output from acpi commands 

~~~bash
Battery 0: Unknown, 99%
Battery 1: Charging, 90%, 00:10:15 until charged
~~~

for more details using acpi command   

~~~bash
acpi -V
~~~

here `-V` flag is capital letter `V`. 

~~~bash
Battery 0: Unknown, 79%
Battery 0: design capacity 1922 mAh, last full capacity 1603 mAh = 83%
Battery 1: Discharging, 92%, 02:05:47 remaining
Battery 1: design capacity 1978 mAh, last full capacity 1978 mAh = 100%
Adapter 0: off-line
Thermal 0: ok, 48.0 degrees C
Thermal 0: trip point 0 switches to mode critical at temperature 128.0 degrees C
Cooling 0: Processor 0 of 10
Cooling 1: intel_powerclamp no state information available
Cooling 2: Processor 0 of 10
Cooling 3: pch_skylake no state information available
Cooling 4: Processor 0 of 10
Cooling 5: x86_pkg_temp no state information available
Cooling 6: iwlwifi 0 of 19
Cooling 7: Processor 0 of 10
Cooling 8: iwlwifi_1 no state information available
~~~






