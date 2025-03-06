-----BEGIN PGP SIGNED MESSAGE-----
Hash: SHA512

Format: 3.0 (quilt)
Source: wine
Binary: wine, wine32, wine64, wine32-preloader, wine64-preloader, wine32-tools, wine64-tools, libwine, libwine-dev, wine-binfmt, fonts-wine
Architecture: any-i386 any-powerpc all armel armhf amd64 arm64
Version: 5.0-3ubuntu1
Maintainer: Ubuntu Developers <ubuntu-devel-discuss@lists.ubuntu.com>
Uploaders:  Michael Gilbert <mgilbert@debian.org>, Stephen Kitt <skitt@debian.org>, Jens Reyer <jre.winesim@gmail.com>,
Homepage: https://www.winehq.org
Standards-Version: 4.5.0
Vcs-Browser: https://salsa.debian.org/wine-team/wine
Vcs-Git: https://salsa.debian.org/wine-team/wine.git
Build-Depends: debhelper (>= 9~), clang [arm64], oss4-dev [kfreebsd-any], freebsd-glue [kfreebsd-any], lzma, flex, bison, quilt, gettext, icoutils, sharutils, pkg-config, dctrl-tools, imagemagick, librsvg2-bin, fontforge-nox, khronos-api (>= 4.6), unicode-data (>= 13), unicode-data (<< 14), libxi-dev, libxt-dev, libxmu-dev, libx11-dev, libxext-dev, libxfixes-dev, libxrandr-dev, libxcursor-dev, libxrender-dev, libxkbfile-dev, libxxf86vm-dev, libxxf86dga-dev, libxinerama-dev, libgl1-mesa-dev, libglu1-mesa-dev, libxcomposite-dev, libxml-simple-perl, libxml-parser-perl, libpng-dev, libssl-dev, libv4l-dev [linux-any kfreebsd-any], libsdl2-dev, libxml2-dev, libgsm1-dev, libjpeg-dev, libkrb5-dev, libsane-dev, libtiff-dev, libudev-dev [linux-any], libpulse-dev [!kfreebsd-any], liblcms2-dev, libldap2-dev, libxslt1-dev, unixodbc-dev, libcups2-dev, libvkd3d-dev [linux-any], libcapi20-dev [linux-any], libvulkan-dev [linux-any], libfaudio-dev (>= 19.06.07), libopenal-dev, libdbus-1-dev, freeglut3-dev, libmpg123-dev, libunwind-dev, libasound2-dev, libgphoto2-dev, libosmesa6-dev, libpcap0.8-dev, libgnutls28-dev, libncurses5-dev, libgettextpo-dev, libfreetype6-dev (>= 2.6.2), libfontconfig1-dev, ocl-icd-opencl-dev, libgstreamer-plugins-base1.0-dev
Package-List:
 fonts-wine deb fonts optional arch=all
 libwine deb libs optional arch=amd64,any-i386,any-powerpc,armel,armhf,arm64
 libwine-dev deb libdevel optional arch=amd64,any-i386,any-powerpc,armel,armhf,arm64
 wine deb otherosfs optional arch=all
 wine-binfmt deb otherosfs optional arch=all
 wine32 deb otherosfs optional arch=any-i386,any-powerpc,armel,armhf
 wine32-preloader deb otherosfs optional arch=i386,powerpc,armel,armhf
 wine32-tools deb libdevel optional arch=any-i386,any-powerpc,armel,armhf
 wine64 deb otherosfs optional arch=amd64,arm64
 wine64-preloader deb otherosfs optional arch=amd64,arm64
 wine64-tools deb libdevel optional arch=amd64,arm64
Checksums-Sha1:
 c979366fd29f18b7fa71482dcec94477d3ad2213 20638224 wine_5.0.orig.tar.xz
 1053966f704d6ced8ef8ea5bd67f3df41fced05f 214860 wine_5.0-3ubuntu1.debian.tar.xz
Checksums-Sha256:
 f27ab068b4790972ab61ff4a1c957cb87341f9943cbf3cc34c69ab97195ca26d 20638224 wine_5.0.orig.tar.xz
 dc022986c6f92f4df71bef24be90346b80152d9407674b0b1b258ab22f359714 214860 wine_5.0-3ubuntu1.debian.tar.xz
Files:
 50afe6fd2dcf7875c75be194b7fd3a03 20638224 wine_5.0.orig.tar.xz
 6a1a3be82813fd260bec52e866c31dbb 214860 wine_5.0-3ubuntu1.debian.tar.xz
Original-Maintainer: Debian Wine Party <debian-wine@lists.debian.org>

-----BEGIN PGP SIGNATURE-----

iQIzBAEBCgAdFiEEJeP/LX9Gnb59DU5Qr8/sjmac4cIFAl6eDJMACgkQr8/sjmac
4cKjTRAAhi292z+tgBlsdzm1YbMYZ/bjP7jSfo8sz/Itz0FvNW+Mv+lm1POugWM9
rn0WWJZTi8iZONgEAEeP1B3I+xk8wmC5M9makkjXVJLJOw+GtX4vIz9E3dQxEfa8
wfkffUkRx+xx/X8TtbWc05uJR2OVDeGucAOyV2WzyUR5O+pE3Uw4si5yX4GlLIAz
pYfNO/TuLtaop7c5/5IOYoEZnR7thLAqqu+jWriNOoqUJM9ZTNYKGV2iWN5+ajk9
3ZPB98UdpQZPq1McrdUr2Z7D3BDXz/nkuudkFUaj/fvJM4gmHYb0zOcVZrPQ3G+E
B1DnbF9DQhZMWhwXGjum66JfiRHl932DaW3KVd4SHFyJDODOVLNGLZHdL/7Xf48D
syKsQqgHDqfQm5WBA6nYfpa00Nip1sNyahiJRRS3kAT/fWv58X2HB7dI4DXQ6IDn
Wq3WhopJKqGVGbaHuMcDWqhWyzl29y8VJPp9/kko7oAVWmwUQ6EXUmw+rxzqen5E
yiqN/gsf6NMf/yFq5XzNbGqB1WZRGUo6YlseZ/ouQdJtpt8OTv555vHA17PCrXd5
NCmzMGphiSH6xCX1VPr7tGVRT/zsyi21L15vr7FVUy4C9delyDP7PTaIeQ2Yvwsj
qbtI6Agi4mp430Jgs9wTUPZEI5qMN8SIdk2AhGRhJT3u3Ms78CM=
=bDe9
-----END PGP SIGNATURE-----
