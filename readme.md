Philwinkle_DeadlockRetry
========================

**Release Notes**

v0.1.1

- Bugfixes, general stability
- Fixed an issue where serializable transaction setting wasn't being propagated
- If module is disabled in System > Config, options are hidden in admin
- If module is disabled registry values are not set
- Added Apache 2.0 license file

v0.1.0

- Initial Release

**Overview**

Retries upon detected deadlock. Provides configuration panel support for enabling module and setting various options like # of retries and how long to space the retries out (using <a href="http://en.wikipedia.org/wiki/Exponential_backoff">Exponential Backoff strategy</a>).

Configuration panel options are located in System > Configuration > System.

<img src="http://i.imgur.com/J79Nef4.png"/>

This module is in early alpha. Do not use with 1.8CE/1.13EE or later. 


**Disclaimer**

I am not claiming this will fix anything or improve the performance of your store. Use at your own risk.

This is not intended to be a long-term solution for stores with systemic issues. This is meant to help solve real-world problems with stores suffering from deadlocks while they work out their own hardware, plugin, customization, other issues.




License
=======

Copyright 2013 Phillip Jackson

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

```
   http://www.apache.org/licenses/LICENSE-2.0
```

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.