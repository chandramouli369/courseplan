for k in range(1,2):

	file = open("input"+str(k)+".txt", "r")

	tot_books,tot_lib,tot_days=map(int, file.readline().split())
	scores = list(map(int, file.readline().split()))
	sort_index = []
	sl=len(scores)
	for i in range(sl):
		m=max(scores[i:])
		t=scores[i]
		scores[i] = m
		scores[scores.index(m)]
		print()
		# for j in range (i+1,sl):
		# 	if (scores[i]<scores[j]):



	library = []

	for i in range(tot_lib):
		tmp = []
		lib = list(map(int, file.readline().split()))
		lib_book_index = list(map(int, file.readline().split()))
		tmp.append(lib)
		tmp.append(lib_book_index)
		library.append(tmp)


	# print (tot_books,tot_lib,tot_days)
	file = open("output"+str(k)+".txt", "w")
	file.write(str(tot_lib)+"\n")
	for i in range (0,tot_lib):
		file.write(str(i)+" "+str(len(library[i][1]))+"\n")
		str1= ""
		for j in range(len(library[i][1])):
			str1 += str(library[i][1][j])+" "
		file.write(str1+"\n")
