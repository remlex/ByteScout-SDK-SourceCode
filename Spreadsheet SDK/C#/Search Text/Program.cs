﻿//*******************************************************************
//       ByteScout Spreadsheet SDK		                                     
//                                                                   
//       Copyright © 2016 ByteScout - http://www.bytescout.com       
//       ALL RIGHTS RESERVED                                         
//                                                                   
//*******************************************************************

using System;
using Bytescout.Spreadsheet;
using Bytescout.Spreadsheet.BaseClasses;

namespace SearchText
{
	class Program
	{
		static void Main(string[] args)
		{
			// Open spreadsheet from file
			Spreadsheet document = new Spreadsheet();
			document.LoadFromFile("example.xls");

			// Get first worksheet
			Worksheet worksheet = document.Workbook.Worksheets[0];

			// Find cells containing "in" substring

            Cell cell = worksheet.Find(
				"in", false /*case insesitive*/, false /*not regexp*/, false /*search forward*/);

			while (cell != null)
			{
				// Print found cell address and value to console
				CellAddress address = cell.GetAddress();
				string message = string.Format(
					"({0}, {1}): {2}", address.Column, address.Row, cell.ValueAsExcelDisplays);

				Console.WriteLine(message);
                
				cell = worksheet.FindNext();
			}

			document.Dispose();

			Console.WriteLine();
			Console.WriteLine("Press any key to continue.");
			Console.ReadKey(true);
		}
	}
}