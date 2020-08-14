---
title: "How to Check Cpu Info in Linux"
date: 2020-08-11T00:23:13+06:00
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: true
enableSeries: true
enableSeriesContent: false
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
tags:
series:
- test
categories:
bit_tags:
- linux
- linux-command
bit_categories:
- linux
image:
---

### `lscpu` command 

`lscpu` is the simplest command that shows the cpu information like processor vendor, number of processor, cache, processor speed

~~~bash
lscpu
~~~

best way to remember, `list cpu` for cpu

~~~
Architecture:                    x86_64
CPU op-mode(s):                  32-bit, 64-bit
Byte Order:                      Little Endian
Address sizes:                   39 bits physical, 48 bits virtual
CPU(s):                          4
On-line CPU(s) list:             0-3
Thread(s) per core:              2
Core(s) per socket:              2
Socket(s):                       1
NUMA node(s):                    1
Vendor ID:                       GenuineIntel
CPU family:                      6
Model:                           78
Model name:                      Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz
Stepping:                        3
CPU MHz:                         1707.849
CPU max MHz:                     3000.0000
CPU min MHz:                     400.0000
BogoMIPS:                        4999.90
Virtualization:                  VT-x
L1d cache:                       64 KiB
L1i cache:                       64 KiB
L2 cache:                        512 KiB
L3 cache:                        3 MiB
NUMA node0 CPU(s):               0-3
Vulnerability Itlb multihit:     KVM: Mitigation: Split huge pages
Vulnerability L1tf:              Mitigation; PTE Inversion; VMX conditional cache flushes, SMT vulnerable
Vulnerability Mds:               Mitigation; Clear CPU buffers; SMT vulnerable
Vulnerability Meltdown:          Mitigation; PTI
Vulnerability Spec store bypass: Mitigation; Speculative Store Bypass disabled via prctl and seccomp
Vulnerability Spectre v1:        Mitigation; usercopy/swapgs barriers and __user pointer sanitization
Vulnerability Spectre v2:        Mitigation; Full generic retpoline, IBPB conditional, IBRS_FW, STIBP conditional, RSB filling
Vulnerability Srbds:             Vulnerable: No microcode
Vulnerability Tsx async abort:   Mitigation; Clear CPU buffers; SMT vulnerable
Flags:                           fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall 
                                 nx pdpe1gb rdtscp lm constant_tsc art arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc cpuid aperfmperf pni pclmulqdq d
                                 tes64 monitor ds_cpl vmx smx est tm2 ssse3 sdbg fma cx16 xtpr pdcm pcid sse4_1 sse4_2 x2apic movbe popcnt tsc_deadline_timer aes
                                  xsave avx f16c rdrand lahf_lm abm 3dnowprefetch cpuid_fault epb invpcid_single pti ssbd ibrs ibpb stibp tpr_shadow vnmi flexpri
                                 ority ept vpid ept_ad fsgsbase tsc_adjust bmi1 hle avx2 smep bmi2 erms invpcid rtm mpx rdseed adx smap clflushopt intel_pt xsave
                                 opt xsavec xgetbv1 xsaves dtherm ida arat pln pts hwp hwp_notify hwp_act_window hwp_epp md_clear flush_l1d

~~~

### getting cpu information using proc/cpuinfo file 

~~~bash
cat /proc/cpuinfo
~~~

in my case I am getting following output 

~~~bash
processor : 0
vendor_id : GenuineIntel
cpu family  : 6
model   : 78
model name  : Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz
stepping  : 3
microcode : 0xd6
cpu MHz   : 500.010
cache size  : 3072 KB
physical id : 0
siblings  : 4
core id   : 0
cpu cores : 2
apicid    : 0
initial apicid  : 0
fpu   : yes
fpu_exception : yes
cpuid level : 22
wp    : yes
flags   : fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc art arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc cpuid aperfmperf pni pclmulqdq dtes64 monitor ds_cpl vmx smx est tm2 ssse3 sdbg fma cx16 xtpr pdcm pcid sse4_1 sse4_2 x2apic movbe popcnt tsc_deadline_timer aes xsave avx f16c rdrand lahf_lm abm 3dnowprefetch cpuid_fault epb invpcid_single pti ssbd ibrs ibpb stibp tpr_shadow vnmi flexpriority ept vpid ept_ad fsgsbase tsc_adjust bmi1 hle avx2 smep bmi2 erms invpcid rtm mpx rdseed adx smap clflushopt intel_pt xsaveopt xsavec xgetbv1 xsaves dtherm ida arat pln pts hwp hwp_notify hwp_act_window hwp_epp md_clear flush_l1d
bugs    : cpu_meltdown spectre_v1 spectre_v2 spec_store_bypass l1tf mds swapgs taa itlb_multihit srbds
bogomips  : 4999.90
clflush size  : 64
cache_alignment : 64
address sizes : 39 bits physical, 48 bits virtual
power management:

processor : 1
vendor_id : GenuineIntel
cpu family  : 6
model   : 78
model name  : Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz
stepping  : 3
microcode : 0xd6
cpu MHz   : 500.002
cache size  : 3072 KB
physical id : 0
siblings  : 4
core id   : 1
cpu cores : 2
apicid    : 2
initial apicid  : 2
fpu   : yes
fpu_exception : yes
cpuid level : 22
wp    : yes
flags   : fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc art arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc cpuid aperfmperf pni pclmulqdq dtes64 monitor ds_cpl vmx smx est tm2 ssse3 sdbg fma cx16 xtpr pdcm pcid sse4_1 sse4_2 x2apic movbe popcnt tsc_deadline_timer aes xsave avx f16c rdrand lahf_lm abm 3dnowprefetch cpuid_fault epb invpcid_single pti ssbd ibrs ibpb stibp tpr_shadow vnmi flexpriority ept vpid ept_ad fsgsbase tsc_adjust bmi1 hle avx2 smep bmi2 erms invpcid rtm mpx rdseed adx smap clflushopt intel_pt xsaveopt xsavec xgetbv1 xsaves dtherm ida arat pln pts hwp hwp_notify hwp_act_window hwp_epp md_clear flush_l1d
bugs    : cpu_meltdown spectre_v1 spectre_v2 spec_store_bypass l1tf mds swapgs taa itlb_multihit srbds
bogomips  : 4999.90
clflush size  : 64
cache_alignment : 64
address sizes : 39 bits physical, 48 bits virtual
power management:

processor : 2
vendor_id : GenuineIntel
cpu family  : 6
model   : 78
model name  : Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz
stepping  : 3
microcode : 0xd6
cpu MHz   : 500.004
cache size  : 3072 KB
physical id : 0
siblings  : 4
core id   : 0
cpu cores : 2
apicid    : 1
initial apicid  : 1
fpu   : yes
fpu_exception : yes
cpuid level : 22
wp    : yes
flags   : fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc art arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc cpuid aperfmperf pni pclmulqdq dtes64 monitor ds_cpl vmx smx est tm2 ssse3 sdbg fma cx16 xtpr pdcm pcid sse4_1 sse4_2 x2apic movbe popcnt tsc_deadline_timer aes xsave avx f16c rdrand lahf_lm abm 3dnowprefetch cpuid_fault epb invpcid_single pti ssbd ibrs ibpb stibp tpr_shadow vnmi flexpriority ept vpid ept_ad fsgsbase tsc_adjust bmi1 hle avx2 smep bmi2 erms invpcid rtm mpx rdseed adx smap clflushopt intel_pt xsaveopt xsavec xgetbv1 xsaves dtherm ida arat pln pts hwp hwp_notify hwp_act_window hwp_epp md_clear flush_l1d
bugs    : cpu_meltdown spectre_v1 spectre_v2 spec_store_bypass l1tf mds swapgs taa itlb_multihit srbds
bogomips  : 4999.90
clflush size  : 64
cache_alignment : 64
address sizes : 39 bits physical, 48 bits virtual
power management:

processor : 3
vendor_id : GenuineIntel
cpu family  : 6
model   : 78
model name  : Intel(R) Core(TM) i5-6300U CPU @ 2.40GHz
stepping  : 3
microcode : 0xd6
cpu MHz   : 500.008
cache size  : 3072 KB
physical id : 0
siblings  : 4
core id   : 1
cpu cores : 2
apicid    : 3
initial apicid  : 3
fpu   : yes
fpu_exception : yes
cpuid level : 22
wp    : yes
flags   : fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx pdpe1gb rdtscp lm constant_tsc art arch_perfmon pebs bts rep_good nopl xtopology nonstop_tsc cpuid aperfmperf pni pclmulqdq dtes64 monitor ds_cpl vmx smx est tm2 ssse3 sdbg fma cx16 xtpr pdcm pcid sse4_1 sse4_2 x2apic movbe popcnt tsc_deadline_timer aes xsave avx f16c rdrand lahf_lm abm 3dnowprefetch cpuid_fault epb invpcid_single pti ssbd ibrs ibpb stibp tpr_shadow vnmi flexpriority ept vpid ept_ad fsgsbase tsc_adjust bmi1 hle avx2 smep bmi2 erms invpcid rtm mpx rdseed adx smap clflushopt intel_pt xsaveopt xsavec xgetbv1 xsaves dtherm ida arat pln pts hwp hwp_notify hwp_act_window hwp_epp md_clear flush_l1d
bugs    : cpu_meltdown spectre_v1 spectre_v2 spec_store_bypass l1tf mds swapgs taa itlb_multihit srbds
bogomips  : 4999.90
clflush size  : 64
cache_alignment : 64
address sizes : 39 bits physical, 48 bits virtual
power management:

~~~

#### Use `lshw` command

using list hardware shows all hardware information. To narrow down output only for cpu we
use `-class CPU` flag

~~~bash
sudo lshw -class CPU
~~~

#### Use `hwinfo` command 

hwinfo is a command line tool to get hardware information of your Linux system.

first we need to install hwinfo using following command
~~~bash
sudo apt install hwinfo
~~~

Once install we can run command 

~~~
hwinfo --cpu
~~~


#### `dmidecode` 

`dimidecode` command retrieve various type of hardware information in linux system. to get only processor related information following command we use 

~~~bash
sudo dmidecode --type processor
~~~



